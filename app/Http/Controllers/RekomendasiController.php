<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\rekomendasi;

class RekomendasiController extends Controller
{
    
    public function tampilApriori(){
        // $data = $this->getBarang();
        // $pelanggan = $this->getPelanggan();
        // $dataProduk = $this->getDataProduk();

        $client = new Client();
        $url = $client->get('http://127.0.0.1:5000/');
        $json_obj=$client->get('http://127.0.0.1:5000/')->getBody();

        $json_result_encode=json_decode((string)$client->get('http://127.0.0.1:5000/')->getBody()->getContents(),true);

        $match= array('['=> ' ', ']' => ' ', '{' => ' ', '}'=>'  ', '->' => 'maka akan dibeli ');

        $temp = strtr($json_result_encode['message'], $match);

        $response1 = explode(" ,", $temp);

        $response = (array)($response1);

        return view('rekomendasi.saranPembelian', compact('response'));


    }

    public function getRekomendasi(){
    
        $client = new Client();
        $response = $client->get('http://127.0.0.1:5000/');

        if ($response->getStatusCode() !== 200) {
            return response()->json(null, 500);
        }

        $payload = json_decode((string) $response->getBody(), true)['message'];
        $payload = str_replace('[', '', $payload);
        $payload = str_replace(']', '', $payload);

        $data = collect(explode('}, {', $payload))
            ->map(function ($item) {
                $data = str_replace('{', '', $item);
                $data = str_replace('}', '', $data);
                $data = explode(' -> ', $data);

                return [
                    0 => $data[0] ? explode(', ', $data[0]) : [],
                    1 => $data[1] ? explode(', ', $data[1]) : [],
                ];
            })
            ->reduce(function ($carry, $item) {
                $keys = collect($item[0]);
                $values = collect($item[1]);

                $keys->each(function ($key) use (&$carry, $values) {
                    $values->each(function ($value) use (&$carry, $key) {
                        $carry->push([
                            'sumber' => $key,
                            'hasil' => $value,
                            'created_at' => date('Y-m-d H:i:s'),
                            'updated_at' => date('Y-m-d H:i:s'),
                        ]);
                    });
                });

                return $carry;
            }, collect([]))
            ->all();

            
            //print("<pre>".print_r($data,true)."</pre>");
           // dd($data);
            
        
         \App\rekomendasi::insert($data);

         return redirect()->route('rekomendasiLama');
    }

    public function rekomendasiLama(){
        $rekomendasi = rekomendasi::all();

        return view('rekomendasi.rekomendasiLama', compact('rekomendasi'));

    }

    public function destroy(){
        rekomendasi::truncate();
  
        return redirect()->route('rekomendasiLama')->with('success', 'Data berhasil dihapus');
    }
}

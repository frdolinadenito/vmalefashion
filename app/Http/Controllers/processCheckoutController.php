<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\province;
use App\city;
use Auth;
use App\transaksi;
use App\detil_transaksi;
use App\barang;
use App\rekomendasi;
use DB;
use Session;


class processCheckoutController extends Controller
{

    public function index(Request $request)
    {
        $title = $request->input('title');
        $origin = $request->input('origin');
        $destination = $request->input('destination');
        $array_result = $request->input('array_result');
        $id2 = $request->input('id2');
        $user = $request->input('user');
        
        $harga = $request->input('user');
        $hargaOngkir = $request->get('harga'); 
    
        return view('process-checkout', compact('title', 'origin', 'destination', 'array_result', 'id2', 'user', 'hargaOngkir'));
    }


  

    public function store(Request $request)
    {
        foreach (session('Cart') as $id => $jumlah) {
            $ambil3 = $jumlah['IDBarang'];
            $barangs = barang::find($ambil3);
            $barangs->update([
                'Stok' => $barangs['Stok'] - $jumlah['quantity'],
            ]);
         }
        
        $idBook = detil_transaksi::all()->last()->id;
        $detiLtransaksi = detil_transaksi::find($idBook);
  
        $detiLtransaksi->update([

            'Tarif' => request('jasa'),

        ]);

        $id = transaksi::all()->last()->id; 
        $transaksi = transaksi::find($id);

        $transaksi->update([
            'Total_Harga' => request('jasa') + $transaksi['Total_Harga'],
        ]);

        


        // //////////////delete////////////
        
        // rekomendasi::truncate();

        // ///////////////////////////////


        // ///////////get//////////////////

        // $client = new Client();
        // $response = $client->get('http://127.0.0.1:5000/');

        // if ($response->getStatusCode() !== 200) {
        //     return response()->json(null, 500);
        // }

        // $payload = json_decode((string) $response->getBody(), true)['message'];
        // $payload = str_replace('[', '', $payload);
        // $payload = str_replace(']', '', $payload);

        // $data = collect(explode('}, {', $payload))
        //     ->map(function ($item) {
        //         $data = str_replace('{', '', $item);
        //         $data = str_replace('}', '', $data);
        //         $data = explode(' -> ', $data);

        //         return [
        //             0 => $data[0] ? explode(', ', $data[0]) : [],
        //             1 => $data[1] ? explode(', ', $data[1]) : [],
        //         ];
        //     })
        //     ->reduce(function ($carry, $item) {
        //         $keys = collect($item[0]);
        //         $values = collect($item[1]);

        //         $keys->each(function ($key) use (&$carry, $values) {
        //             $values->each(function ($value) use (&$carry, $key) {
        //                 $carry->push([
        //                     'sumber' => $key,
        //                     'hasil' => $value,
        //                     'created_at' => date('Y-m-d H:i:s'),
        //                     'updated_at' => date('Y-m-d H:i:s'),
        //                 ]);
        //             });
        //         });

        //         return $carry;
        //     }, collect([]))
        //     ->all();

            
        //  \App\rekomendasi::insert($data);


        /////////////////////////////////
        
        Session::forget('Cart');
        if (!Session::has('Cart')) {
            $users1 = Auth::user()->id;
            return redirect()->route('riwayat', $users1)->with('success', 'Data berhasil ditambahkan');
        } 

    }
}

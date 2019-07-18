<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\province;
use App\city;

class OngkirController extends Controller
{
    public function index()
    {
        return "ini halaman page controller";
    }

    public function getprovince()
    {
        $client = new Client();

        try{
            $response = $client->get('https://api.rajaongkir.com/starter/province',
            array(
                'headers'=> array (
                    'key'=> '4a641aca016c6d3694dd9a5a76ff0229',
                )
            )
                );
        }catch(RequestException $e){
            var_dump($e->getResponse()->getBody()->getContents());
        }

        $json = $response->getBody()->getContents();

        $array_result = json_decode($json,true);

    //    print_r($array_result);
    //    print_r($json);

        //echo $array_result["rajaongkir"]["results"][1]["province"];

        // for($i = 0; $i < count($array_result["rajaongkir"]["results"]); $i++ )
        // {
        //     $province = new \App\province;
        //     $province->id = $array_result["rajaongkir"]["results"][$i]["province_id"];
        //     $province->name = $array_result["rajaongkir"]["results"][$i]["province"];
        //     $province->save();
        // }

    }

    public function getcity()
    {
        $client = new Client();

        try{
            $response = $client->get('https://api.rajaongkir.com/starter/city',
            array(
                'headers'=> array (
                    'key'=> '4a641aca016c6d3694dd9a5a76ff0229',
                )
            )
                );
        }catch(RequestException $e){
            var_dump($e->getResponse()->getBody()->getContents());
        }

        $json = $response->getBody()->getContents();

        $array_result = json_decode($json,true);

       print_r($array_result);

       // echo $array_result["rajaongkir"]["results"][0]["city_name"];

    //    for($i = 0; $i < count($array_result["rajaongkir"]["results"]); $i++ )
    //     {
    //         $city = new \App\city;
    //         $city->id = $array_result["rajaongkir"]["results"][$i]["city_id"];
    //         $city->name = $array_result["rajaongkir"]["results"][$i]["city_name"];
    //         $city->id_province = $array_result["rajaongkir"]["results"][$i]["province_id"];
    //         $city->save();
    //     }

       

    }

    public function checkshipping()
    {
        $title = "Check Shipping";
        $city = city::get();

        return view('jne.check-shipping', compact('title', 'city'));
        

    }

    public function processShipping(Request $request)
    {
        $title = "Check Shipping Result";
        $client = new Client();

        try{
            $response = $client->request('POST','https://api.rajaongkir.com/starter/cost',
                [
                    'body' => 'origin='.$request->origin.'&destination='.$request->destination.'&weight='.$request->weight.'&courier='.$request->jasa,
                    'headers' => [
                        'key'=> '4a641aca016c6d3694dd9a5a76ff0229',
                        'content-type'=> 'application/x-www-form-urlencoded',
                    ]
                ]
                );
        }catch(RequestException $e){
            var_dump($e->getResponse()->getBody()->getContents());
        }

        $json = $response->getBody()->getContents();

        $array_result = json_decode($json,true);

        $origin = $array_result["rajaongkir"]["origin_details"]["city_name"];
        $destination = $array_result["rajaongkir"]["destination_details"]["city_name"];

       //print_r($array_result);

        // echo $array_result["rajaongkir"]["results"][0]["costs"][1]["cost"][0]["value"];

        return view('jne.check-shipping-result', compact('title', 'origin','destination', 'array_result'));
    }
}

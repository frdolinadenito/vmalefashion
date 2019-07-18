<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tracking;
use App\transaksi;

class TrackingController extends Controller
{
    public function index (Request $req){

		// $trackings= tracking::all();
		
		
        
            return view ('jne.tracking');
  
        }

       
  
    public function store(Request $request)
    {
		// tracking::create([
    //         'jasa' => request('jasa'),
    //         'resi' => request('resi'),
           

    //     ]);
        
		return view('jne.tracking');
		
    }

    
    public function lacak(Request $request,$id)
    {
      $IDTransaksi = transaksi::find($id);
      $resi = $IDTransaksi['Resi_Pengiriman'];
      $jasa = $IDTransaksi['Jasa_Pengiriman'];

		return view('jne.lacak',compact('IDTransaksi','resi','jasa'));
		
    }

    
}

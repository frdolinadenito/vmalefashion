<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;


class DashboardController extends Controller
{
    public function create()
  {
    
    $data['jumlahTransaksi'] =\App\transaksi::count();
    $data['jumlahPelanggan'] =\App\User::where('ID_Peran',1)->count();
    $data['jumlahPegawai'] =\App\User::where('ID_Peran',2)->count();
    $data['jumlahBarang'] =\App\barang::count();

  
      return view('dashboard.create')->with('data',$data);
  }
}

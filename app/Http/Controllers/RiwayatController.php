<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\transaksi;
use App\detil_transaksi;
use App\User;
use Auth;
use DB;
use Action;

class RiwayatController extends Controller
{
    public function index($iduser)
    {
         $id = transaksi::all()->last()->id;
        $detail = DB::table('detil_transaksi')
                       ->join('transaksi', 'transaksi.id', '=', 'detil_transaksi.ID_Transaksi')
                       ->join ('pengguna','transaksi.ID_Pengguna','=','pengguna.id')
                      ->select('detil_transaksi.*','transaksi.*','pengguna.*')
                       ->where('transaksi.id','=',$id)
                       ->get('id');
        $users1 = Auth::user()->id;
        $transaksi= transaksi::all();
        $IDTransaksi = transaksi::where('ID_Pengguna','=', $iduser)->get();
        
        return view('riwayat',compact('transaksi','IDTransaksi'));
    }
    
    public function store(Request $request,$id)
    {
        //$id = $request->input('id');
        $trans=transaksi::find($id);
   
        $trans->update([

        'Status_Pemesanan'=>request('Status_Pemesanan'),
        ]);
        $users1 = Auth::user()->id;
        return redirect()->route('riwayat',$users1)->with('success', 'Data berhasil ditambahkan');
    }
    
}

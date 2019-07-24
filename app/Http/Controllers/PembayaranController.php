<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pembayaran;
use App\transaksi;
use DB;
use Auth;

class PembayaranController extends Controller
{
    public function create($id)
    {
        //$trans= transaksi::all();
        $IDTransaksi = transaksi::where('id','=', $id)->get();
        $detail = DB::table('detil_transaksi')
                       ->join('transaksi', 'transaksi.id', '=', 'detil_transaksi.ID_Transaksi')
                       ->join ('pengguna','transaksi.ID_Pengguna','=','pengguna.id')
                      ->select('detil_transaksi.*','transaksi.*','pengguna.*')
                       ->where('transaksi.id','=',$id)
                       ->get('id');
        
        return view('pembayaran',compact('IDTransaksi'))->with('detail',$detail);
    }
  
    public function store(Request $request,$id)
    {
        date_default_timezone_set('Asia/Jakarta');
        $waktu  = date("Y-m-d H:i:s");
        if($request->hasFile('Bukti_Pembayaran'))
      {
          $gambar = $request->file('Bukti_Pembayaran')->getClientOriginalName();
          $destination = base_path('../../public_html/BuktiPembayaran/');
          $request->file('Bukti_Pembayaran')->move($destination,$gambar);
      }

      pembayaran::create([
        'ID_Transaksi' => $id,
        'Nama'=>request('Nama'),
        'Bank'=>request('Bank'),
        'Jumlah'=>request('Jumlah'),
        'Tanggal_Pembayaran'=>$waktu,
        'Bukti_Pembayaran' => request('Bukti_Pembayaran')->getClientOriginalName(),
    ]);
    $trans=transaksi::find($id);
   
    $trans->update([

       'Status_Pemesanan'=>'Bukti Telah Terupdate',
     ]);

    $users1 = Auth::user()->id;
    return redirect()->route('riwayat',$users1)->with('success', 'Data berhasil ditambahkan');
    }
}

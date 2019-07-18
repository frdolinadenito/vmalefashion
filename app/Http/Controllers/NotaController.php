<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\transaksi;
use App\detil_transaksi;
use App\User;
use DB;

class NotaController extends Controller
{
    public function index($id)
    {
        $detail = DB::table('detil_transaksi')
                       ->join('transaksi', 'transaksi.id', '=', 'detil_transaksi.ID_Transaksi')
                       ->join ('detil_pengguna','detil_pengguna.ID_Transaksi','=','transaksi.id')
                       ->select('detil_transaksi.*','transaksi.*','detil_pengguna.*')
                        ->where('transaksi.id','=',$id)
                        ->get('id');

                        $pengguna = DB::table('transaksi')
                        ->join ('detil_pengguna','detil_pengguna.ID_Transaksi','=','transaksi.id')
                       ->select('transaksi.*','detil_pengguna.*')
                        ->where('transaksi.id','=',$id)
                        ->get('id');

                        $ongkir = DB::table('detil_transaksi')
                        ->select('detil_transaksi.*')
                        ->where('detil_transaksi.ID_Transaksi','=',$id)
                        ->get('id');

                        $transaksi = transaksi::find($id);
                     
         return view('nota',compact('transaksi'))->with('detail',$detail)->with('pengguna',$pengguna)->with('ongkir',$ongkir);
    }


    public function nota_pdf($id)
    {
        $detail = DB::table('detil_transaksi')
                       ->join('transaksi', 'transaksi.id', '=', 'detil_transaksi.ID_Transaksi')
                       ->join ('detil_pengguna','detil_pengguna.ID_Transaksi','=','transaksi.id')
                       ->select('detil_transaksi.*','transaksi.*','detil_pengguna.*')
                        ->where('transaksi.id','=',$id)
                        ->get('id');

                        $pengguna = DB::table('transaksi')
                        ->join ('detil_pengguna','detil_pengguna.ID_Transaksi','=','transaksi.id')
                       ->select('transaksi.*','detil_pengguna.*')
                        ->where('transaksi.id','=',$id)
                        ->get('id');

                        $ongkir = DB::table('detil_transaksi')
                        ->select('detil_transaksi.*')
                        ->where('detil_transaksi.ID_Transaksi','=',$id)
                        ->get('id');

                        $transaksi = transaksi::find($id);

        $pdf = \PDF::loadView('cetakNota', compact('transaksi','detail','pengguna','ongkir'));
        return $pdf->download('nota.pdf');
    }

    public function index2($id)
    {
        $detail = DB::table('detil_transaksi')
                       ->join('transaksi', 'transaksi.id', '=', 'detil_transaksi.ID_Transaksi')
                       ->join ('pengguna','transaksi.ID_Pengguna','=','pengguna.id')
                      ->select('detil_transaksi.*','transaksi.*','pengguna.*')
                       ->where('transaksi.id','=',$id)
                       ->get('id');

                       $pengguna = DB::table('transaksi')
                       ->join ('detil_pengguna','detil_pengguna.ID_Transaksi','=','transaksi.id')
                      ->select('transaksi.*','detil_pengguna.*')
                       ->where('transaksi.id','=',$id)
                       ->get('id');

                          $detail123 = DB::table('transaksi')
                       ->join ('pengguna','transaksi.ID_Pengguna','=','pengguna.id')
                      ->select('detil_transaksi.*','transaksi.*','pengguna.*')
                      ->where('transaksi.id','=',$id)
                      ->get('id');
        echo '<pre>';
        print_r($detail123);
    }
}

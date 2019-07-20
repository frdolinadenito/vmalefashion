<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\transaksi;
use App\User;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

class TransaksiController extends Controller
{
    public function index(Request $req)
    {
        if ($req->search == "") {
            $transaksis = transaksi::paginate(10);
            return view('transaksi.index', compact('transaksis'));
        } else {
            $transaksis = transaksi::where('Status_Pemesanan', 'LIKE', '%' . $req->search . '%')
                ->paginate(10);
            $transaksis->appends($req->only('search'));
            return view('transaksi.index', compact('transaksis'));
        }
    }


    public function detailPembelian($id)
    {
        $detail = DB::table('detil_transaksi')
            ->join('transaksi', 'transaksi.id', '=', 'detil_transaksi.ID_Transaksi')
            ->join('detil_pengguna', 'detil_pengguna.ID_Transaksi', '=', 'transaksi.id')
            ->select('detil_transaksi.*', 'transaksi.*', 'detil_pengguna.*')
            ->where('transaksi.id', '=', $id)
            ->get('id');

        $pengguna = DB::table('transaksi')
            ->join('detil_pengguna', 'detil_pengguna.ID_Transaksi', '=', 'transaksi.id')
            ->select('transaksi.*', 'detil_pengguna.*')
            ->where('transaksi.id', '=', $id)
            ->get('id');

        $ongkir = DB::table('detil_transaksi')
            ->select('detil_transaksi.*')
            ->where('detil_transaksi.ID_Transaksi', '=', $id)
            ->get('id');
        return view('transaksi.detailPembelian')->with('detail', $detail)->with('pengguna', $pengguna)->with('ongkir', $ongkir);
    }

    public function detailPembayaran($id)
    {

        $detail = DB::table('transaksi')
            ->join('pembayaran', 'transaksi.id', '=', 'pembayaran.ID_Transaksi')
            ->select('pembayaran.*', 'transaksi.*')
            ->where('transaksi.id', '=', $id)
            ->get('id');

        return view('transaksi.detailPembayaran')->with('detail', $detail);
    }

    public function KonfirmasiPembayaran($id)
    {
        $IDTransaksi = transaksi::find($id);
        $IDTransaksi->update([

            'Resi_Pengiriman' => request('Resi_Pengiriman'),
            'Status_Pemesanan' => request('Status_Pemesanan'),

        ]);
        return redirect()->route('transaksi.index')->with('success', 'Data transaksi berhasil ditambahkan');
    }

    public function Laporan()
    {
        $id = request('tahun');
        $pendapatanBulanan_data = DB::table('transaksi')
            ->select(DB::raw('monthname(transaksi.Tanggal_Pembelian) AS bulan'), DB::raw('SUM(transaksi.Total_Harga) as countPembayaran'))
            ->whereYear('transaksi.Tanggal_Pembelian', '=', $id)
            ->where('transaksi.Status_Pemesanan', '=', 'Selesai')
            ->groupBy('transaksi.Tanggal_Pembelian')
            ->orderBy('transaksi.Tanggal_Pembelian', 'ASC')->get();


        return view('laporan.LaporanBulanan')->with('pendapatanBulanan_data', $pendapatanBulanan_data);
    }


    // public function processForm() {
    //     $id  = Input::get('tahun') ;
        
    //     return Redirect::to('pendapatanBulanan/'.$id) ;
    // }

    public function pendapatanBulanan(Request $request,$id)
    {
        $pendapatanBulanan_data = DB::table('transaksi')
            ->select(DB::raw('monthname(transaksi.Tanggal_Pembelian) AS bulan'), 
                    DB::raw('sum(transaksi.Total_Harga) as countPembayaran'))
            ->whereYear('transaksi.Tanggal_Pembelian', '=', $id)
            ->where('transaksi.Status_Pemesanan', '=', 'Selesai')
            ->groupBy (DB::raw('MONTHNAME(transaksi.Tanggal_Pembelian) '))  
            ->orderBy (DB::raw('MONTHNAME(transaksi.Tanggal_Pembelian)' ),'ASC') 
            ->get();
            $tahun = $id;
        return view('laporan.LaporanBulananProses', compact('pendapatanBulanan_data','tahun'));
    }

    public function Bulanan_pdf($id)
    {
        $pendapatanBulanan_data = DB::table('transaksi')
            ->select(DB::raw('monthname(transaksi.Tanggal_Pembelian) AS bulan'), 
                    DB::raw('sum(transaksi.Total_Harga) as countPembayaran'))
            ->whereYear('transaksi.Tanggal_Pembelian', '=', $id)
            ->where('transaksi.Status_Pemesanan', '=', 'Selesai')
            ->groupBy (DB::raw('MONTHNAME(transaksi.Tanggal_Pembelian) '))  
            ->orderBy (DB::raw('MONTHNAME(transaksi.Tanggal_Pembelian)' ),'ASC') 
            ->get();
            $tahun = $id;

        $pdf = \PDF::loadView('laporan.cetakLaporanBulanan', compact('pendapatanBulanan_data', 'tahun'));
        return $pdf->download('LaporanBulanan.pdf');
    }


    //////////////////////////////////////////////

    public function Laporan2()
    {
        $id = request('tahun');
        $pendapatanTahunan_data = DB::table('transaksi')
        ->select(DB::raw('year(transaksi.Tanggal_Pembelian) AS tahun'), DB::raw('SUM(transaksi.Total_Harga) as countPembayaran'))
        ->whereYear('transaksi.Tanggal_Pembelian', '=', $id)
        ->where('transaksi.Status_Pemesanan', '=', 'Selesai')
        ->groupBy('transaksi.Tanggal_Pembelian')
        ->orderBy('transaksi.Tanggal_Pembelian', 'ASC')->get();

        return view('laporan.LaporanTahunan')->with('pendapatanTahunan_data', $pendapatanTahunan_data);
    }




    public function pendapatanTahunan(Request $request, $id)
    {
        $pendapatanTahunan_data = DB::table('transaksi')
        ->select(DB::raw('year(transaksi.Tanggal_Pembelian) AS tahun'),
                 DB::raw('SUM(transaksi.Total_Harga) as countPembayaran'))
        ->whereYear('transaksi.Tanggal_Pembelian', '=', $id)
        ->where('transaksi.Status_Pemesanan', '=', 'Selesai')
        ->groupBy(DB::raw('year(transaksi.Tanggal_Pembelian) '))
        ->orderBy(DB::raw('year(transaksi.Tanggal_Pembelian) '), 'ASC')->get();
        $tahun = $id;

        return view('laporan.LaporanTahunanProses',compact('pendapatanTahunan_data','tahun'));
    }

    public function Tahunan_pdf($id)
    {
        $pendapatanTahunan_data = DB::table('transaksi')
        ->select(DB::raw('year(transaksi.Tanggal_Pembelian) AS tahun'),
                 DB::raw('SUM(transaksi.Total_Harga) as countPembayaran'))
        ->whereYear('transaksi.Tanggal_Pembelian', '=', $id)
        ->where('transaksi.Status_Pemesanan', '=', 'Selesai')
        ->groupBy(DB::raw('year(transaksi.Tanggal_Pembelian) '))
        ->orderBy(DB::raw('year(transaksi.Tanggal_Pembelian) '), 'ASC')->get();
        $tahun = $id;

        $pdf = \PDF::loadView('laporan.cetakLaporanTahunan', compact('pendapatanTahunan_data', 'tahun'));
        return $pdf->download('LaporanTahunan.pdf');
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\barang;
use App\transaksi;
use App\detil_transaksi;
use DB;
use Auth;
use Session;
use GuzzleHttp\Client;
use App\province;
use App\city;
use App\detil_pengguna;
use View;

class CheckOutController extends Controller
{
    public function index(transaksi $id)
    {

       
        $transaksis = transaksi::find($id);

        $title = "Check Shipping";
        $city = city::get();

        $idUser = Auth::user()->id;
        $idAlamat = detil_pengguna::where('ID_Pengguna','=', $idUser)->latest()->first();
        $alamats = detil_pengguna::where('ID_Pengguna','=', $idUser)->get();

        
        $alamat = detil_pengguna::find($idAlamat);
        $cart = session()->get('Cart');
        return view('checkout', compact('transaksis', 'title', 'city','alamat','alamats'));
    }

    public function show($id)
    {
        $product = barang::find($id);
        
        if (!$product) {

            abort(404);
        }
        $cart = session()->get('Cart');

        return redirect('checkout')->with('success', 'Product added to cart successfully!');
    }

    public function create()
    { }

    public function store(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $waktu  = date("Y-m-d H:i:s");
        $id2 = transaksi::all()->last()->id;
        $id3 = 1 + $id2;
        $r = 'TF';
        $a = '-';
        $tgl = date("dmy", strtotime($waktu));
        $kodeBooking = $r . $tgl . $a . $id3;
        $TotalBelanja = 0;
        $subtotal = 0;

        foreach (session('Cart') as $id => $jumlah) {
            
            $subtotal =  $subtotal + ($jumlah['Harga_Barang'] * $jumlah['quantity']);
            $TotalBelanja += $subtotal;
            $user = User::find(request('id'));
            $idUser = Auth::user()->id;

            /////////reja ongkir///////////////////

            $title = "Check Shipping Result";
            $client = new Client();

            try {
                $response = $client->request(
                    'POST',
                    'https://api.rajaongkir.com/starter/cost',
                    [
                        'body' => 'origin=501&destination=' . $request->destination . '&weight=' . $jumlah['Berat'] . '&courier=' . $request->jasa,
                        'headers' => [
                            'key' => '4a641aca016c6d3694dd9a5a76ff0229',
                            'content-type' => 'application/x-www-form-urlencoded',
                        ]
                    ]
                );
            } catch (RequestException $e) {
                var_dump($e->getResponse()->getBody()->getContents());
            }
            $json = $response->getBody()->getContents();
            $array_result = json_decode($json, true);
            $origin = $array_result["rajaongkir"]["origin_details"]["city_name"];
            $destination = $array_result["rajaongkir"]["destination_details"]["city_name"];

            /////////////////////////////////////
        }

        transaksi::create([
            'ID_Pengguna' => $idUser,
            'ID_Ongkir' => $request->destination,
            'Tanggal_Pembelian' => $waktu,
            'Total_Harga' => $subtotal,
            'Status_Pemesanan' => ('pending'),
            'Nomor_Tagihan' => $kodeBooking,
            'Jasa_Pengiriman' => $request->jasa,
        ]);

        $idUser2 = Auth::user()->id;

        detil_pengguna::create([
            'ID_Pengguna' => $idUser2,
            'ID_Transaksi' => $id3,
            'Nama_Penerima' => request('Nama_Penerima'),
            'No_Telepon' => request('No_Telepon'),
            'Kecamatan' => request('Kecamatan'),
            'Kode_Pos' => request('Kode_Pos'),
            'Alamat_Lengkap' => request('Alamat_Lengkap'),

        ]);

        $detail = DB::table('detil_transaksi')
            ->join('transaksi', 'transaksi.id', '=', 'detil_transaksi.ID_Transaksi')
            ->join('pengguna', 'transaksi.ID_Pengguna', '=', 'pengguna.id')
            ->select('detil_transaksi.*', 'transaksi.*', 'pengguna.*')
            ->where('transaksi.id', '=', $id2)
            ->get('id');

        $users1 = Auth::user()->id;
        $detail = DB::table('detil_transaksi')
            ->join('transaksi', 'transaksi.id', '=', 'detil_transaksi.ID_Transaksi')
            ->join('pengguna', 'transaksi.ID_Pengguna', '=', 'pengguna.id')
            ->select('detil_transaksi.*', 'transaksi.*', 'pengguna.*')
            ->where('transaksi.id', '=', $id)
            ->get('id');

        $idBook = transaksi::all()->last()->id;
        $idBrg = transaksi::all();
        $subtotal = 0;

        foreach (session('Cart') as $id => $jumlah) {
            $subtotal = $subtotal + ($jumlah['Harga_Barang'] * $jumlah['quantity']);
            $idBook2 = DB::getPdo()->lastInsertId();
            $ambil2 = request('ID_Ongkir');
         
            detil_transaksi::create([
                'ID_Transaksi' => $idBook,
                'ID_Barang' => $jumlah['IDBarang'],
                'Jumlah_Belanja' => $jumlah['quantity'],
                'Total_Pembelian' => $jumlah['quantity'] * $jumlah['Harga_Barang'],
                'Nama' => $jumlah['Nama_Barang'],
                'Harga_Satuan' => $jumlah['Harga_Barang'],
                'Nama_Kota' => request('destination'),
            ]); 
        }

        return redirect()->route('proses', compact('title', 'origin', 'destination', 'array_result', 'id2', 'user'));
        
    }

   
}

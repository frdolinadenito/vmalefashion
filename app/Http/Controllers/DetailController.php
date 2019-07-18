<?php

namespace App\Http\Controllers;
use App\barang;
use App\kategori;
use App\rekomendasi;
use DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Post;


class DetailController extends Controller
{
    public function index(Request $request,barang $barangs)
    {
            $detail = barang::find($barangs);
            $products = barang::all();
            $rekomendasi = rekomendasi::all();
            $coba = $barangs['Nama_Barang'];
            $coba2 = rekomendasi::find($coba);
            

            
            $tasks = rekomendasi::where('sumber',$coba)->pluck('hasil');
            // $terms = explode(" ,", $tasks);
            //$pecah = explode(' ', $request->get('tasks'));
          

           //penting/ $tampil = barang::where('Nama_Barang',$tasks)->get();

           

            $tampil2 = barang::where(function ($query) use ($tasks) {
                foreach ($tasks as $value) {
                    $query->orWhere('Nama_Barang', 'like', "%{$value}%");
                }
            })
            ->get();
     
             return view('detailProduk', compact('detail','products','barangs','coba','coba2','rekomendasi','tasks','tampil2'));
   
    }

    public function create()
    {
  
        return view('detailProduk');
    }
  
    public function addToCart($id)
    {
        $product = barang::find($id);
 
        if(!$product) {
 
            abort(404);
 
        }
        $cart = session()->get('Cart');
       

					$jumlah = request('jumlah');
					
		
     
					
 
        // if cart is empty then this the first product
        if(!$cart) {
            $cart = [
                    $id => [
                        "Nama_Barang" => $product->Nama_Barang,
                        "quantity" => $jumlah,
                        "Harga_Barang" => $product->Harga_Barang,
                        "gambar" => $product->gambar
                    ]
            ];
 
            session()->put('Cart', $cart);
 
            return redirect('cart')->with('success', 'Product added to cart successfully!');
        }
 
        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {
 
            $cart[$id]['quantity']+$jumlah;
 
            session()->put('Cart', $cart);
 
            return redirect('cart')->with('success', 'Product added to cart successfully!');
        }
 
        // if item not exist in cart then add to cart with quantity = jumlah
        $cart[$id] = [
            "Nama_Barang" => $product->Nama_Barang,
            "quantity" => $jumlah,
            "Harga_Barang" => $product->Harga_Barang,
            "gambar" => $product->gambar
        ];

 
        session()->put('Cart', $cart);
 
        return redirect('cart')->with('success', 'Product added to cart successfully!');
        
    }

   

}

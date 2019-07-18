<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\barang;
use Session;
class ProductController extends Controller
{
    public function index(Request $req)
    {
        if($req->search == "") {
            $products = barang::paginate(env('PER_PAGE'));
             return view('index', compact('products'));
   
         }
         else{
             $products = barang::where('Nama_Barang','LIKE','%' .$req->search. '%')
                 ->paginate(env('PER_PAGE'));
             $products->appends($req->only('search'));
             return view ('index',compact('products'));
   
         }
 
    }
 
    public function index2(Request $req)
    {
        if($req->search == "") {
            $products = barang::paginate(env('PER_PAGE'));
             return view('produk', compact('products'));
         }
         else{
             $products = barang::where('Nama_Barang','LIKE','%' .$req->search. '%')
                 ->paginate(env('PER_PAGE'));
             $products->appends($req->only('search'));
             return view ('produk',compact('products'));
         }  
    }

    

    public function cart()
    {
        $cart = session()->get('Cart');
        return view('cart',compact('cart'));
    }
   
    public function addToCart($id)
    {
        $product = barang::find($id);

        if(!$product) {
            abort(404);
        }
        $cart = session()->get('Cart');
 
        // if cart is empty then this the first product
        if(!$cart) {
            $cart = [
                    $id => [
                        "IDBarang"=>$product->id,
                        "Nama_Barang" => $product->Nama_Barang,
                        "quantity" => 1,
                        "Harga_Barang" => $product->Harga_Barang,
                        "gambar" => $product->gambar,
                        "Berat" => $product->Berat
                    ]
            ];
            session()->put('Cart', $cart);
            return redirect('cart')->with('success', 'Product added to cart successfully!');
        }
 
        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
            session()->put('Cart', $cart);
            return redirect('cart')->with('success', 'Product added to cart successfully!');
        }
 
        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "IDBarang"=>$product->id,
            "Nama_Barang" => $product->Nama_Barang,
            "quantity" => 1,
            "Harga_Barang" => $product->Harga_Barang,
            "gambar" => $product->gambar,
            "Berat" => $product->Berat

        ];
        session()->put('Cart', $cart);
        return redirect('cart')->with('success', 'Product added to cart successfully!');
    }

    public function addToCart2($id)
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
                        "gambar" => $product->gambar,
                        "Berat" => $product->Berat

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
 
        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "Nama_Barang" => $product->Nama_Barang,
            "quantity" => $jumlah,
            "Harga_Barang" => $product->Harga_Barang,
            "gambar" => $product->gambar,
            "Berat" => $product->Berat

        ];

 
        session()->put('Cart', $cart);
 
        return redirect('cart')->with('success', 'Product added to cart successfully!');
        
    }

 
    public function remove($id)
    {
            
            $cart = session()->get('Cart');
            if($cart[$id]["quantity"]>=1){
            $cart[$id]["quantity"] = $cart[$id]["quantity"] - 1;
            session()->put('Cart', $cart);}
            else{
                unset($cart[$id]);
                session()->put('cart', $cart);
                session()->flash('success', 'Product removed successfully');
            }
            

            return redirect('cart')->with('success', 'Data berhasil dihapus');
        
    }

    public function kaos(Request $req)
    {
        if($req->search == "") {
            $products = barang::paginate(env('PER_PAGE'));
             return view('produk-kaos', compact('products'));
   
         }
         else{
             $products = barang::where('Nama_Barang','LIKE','%' .$req->search. '%')
                 ->paginate(env('PER_PAGE'));
             $products->appends($req->only('search'));
             return view ('produk-kaos',compact('products'));
   
         }
 
         
    }

    public function tas(Request $req)
    {
        if($req->search == "") {
            $products = barang::paginate(env('PER_PAGE'));
             return view('produk-tas', compact('products'));
   
         }
         else{
             $products = barang::where('Nama_Barang','LIKE','%' .$req->search. '%')
                 ->paginate(env('PER_PAGE'));
             $products->appends($req->only('search'));
             return view ('produk-tas',compact('products'));
   
         }

    }

    public function sepatu(Request $req)
    {
        if($req->search == "") {
            $products = barang::paginate(env('PER_PAGE'));
             return view('produk-sepatu', compact('products'));
   
         }
         else{
             $products = barang::where('Nama_Barang','LIKE','%' .$req->search. '%')
                 ->paginate(env('PER_PAGE'));
             $products->appends($req->only('search'));
             return view ('produk-sepatu',compact('products'));
   
         }
 
         
    }

    public function sweater(Request $req)
    {
        if($req->search == "") {
            $products = barang::paginate(env('PER_PAGE'));
             return view('produk-sweater', compact('products'));
   
         }
         else{
             $products = barang::where('Nama_Barang','LIKE','%' .$req->search. '%')
                 ->paginate(env('PER_PAGE'));
             $products->appends($req->only('search'));
             return view ('produk-sweater',compact('products'));
   
         }
 
         
    }

    public function jaket(Request $req)
    {
        if($req->search == "") {
            $products = barang::paginate(env('PER_PAGE'));
             return view('produk-jaket', compact('products'));
   
         }
         else{
             $products = barang::where('Nama_Barang','LIKE','%' .$req->search. '%')
                 ->paginate(env('PER_PAGE'));
             $products->appends($req->only('search'));
             return view ('produk-jaket',compact('products'));
   
         }
 
         
    }
}

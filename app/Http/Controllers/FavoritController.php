<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\barang;
use Session;

class FavoritController extends Controller
{
    public function favorit()
    {
        $product = barang::all();
        $favorit = session()->get('Favorit');
        return view('favorit',compact('favorit','product'));
    }
   
    public function addToFavorit($id)
    {
        $product = barang::find($id);
 
        if(!$product) {
 
            abort(404);
 
        }
        $favorit = session()->get('Favorit');
 
        // if favorit is empty then this the first product
        if(!$favorit) {
            $favorit = [
                    $id => [
                        "IDBarang"=>$product->id,
                        "Nama_Barang" => $product->Nama_Barang,
                        "quantity" => 1,
                        "Harga_Barang" => $product->Harga_Barang,
                        "gambar" => $product->gambar,
                        "Berat" => $product->Berat
                    ]
            ];
 
            session()->put('Favorit', $favorit);
 
            return redirect('favorit')->with('success', 'Product added to favorit successfully!');
        }
 
        // if favorit not empty then check if this product exist then increment quantity
        if(isset($favorit[$id])) {
 
            $favorit[$id]['quantity']++;
 
            session()->put('Favorit', $favorit);
 
            return redirect('favorit')->with('success', 'Product added to favorit successfully!');
        }
 
        // if item not exist in favorit then add to favorit with quantity = 1
        $favorit[$id] = [
            "IDBarang"=>$product->id,
            "Nama_Barang" => $product->Nama_Barang,
            "quantity" => 1,
            "Harga_Barang" => $product->Harga_Barang,
            "gambar" => $product->gambar,
            "Berat" => $product->Berat

        ];

 
        session()->put('Favorit', $favorit);
 
        return redirect('favorit')->with('success', 'Product added to favorit successfully!');
        
    }

    public function remove($id)
    {
            
            $favorit = session()->get('Favorit');
            if($favorit[$id]["quantity"]>=1){
            $favorit[$id]["quantity"] = $favorit[$id]["quantity"] - 1;
            session()->put('Favorit', $favorit);}
            else{
                unset($favorit[$id]);
                session()->put('favorit', $favorit);
                session()->flash('success', 'Product removed successfully');
            }
            

            return redirect('favorit')->with('success', 'Data berhasil dihapus');
        
    }
}

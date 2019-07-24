<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\barang;
use App\kategori;
// use Illuminate\Http\UploadedFile;

class BarangController extends Controller
{
    public function index (Request $req){
        if($req->search == "") {
           $barangs = barang::paginate(env('PER_PAGE'));
            return view('barang.index', compact('barangs'));
  
        }else{
            $barangs = barang::where('Nama_Barang','LIKE','%' .$req->search. '%')
                ->paginate(env('PER_PAGE'));
            $barangs->appends($req->only('search'));
            return view ('barang.index',compact('barangs'));
  
        }
    }
  
   
    public function create()
    {
        $kategori = kategori::all();
        
        return view('barang.create',compact('kategori'));
    }
  
    public function store(Request $request)
    {
        $barangs = barang::all();
        $barang = barang::find(request('ID_Kategori'));
        
       
        $this->validate($request,[
            'gambar' => ['mimes: jpg,jpeg,JPEG,png,gif,bmp','max:2024'],
        ]);
        $gambar = $request->files->get('gambar')->getClientOriginalName();
        $destination = base_path('../../public_html/uploadImage/');
        $request->file('gambar')->move($destination,$gambar);
  
        barang::create([
            'ID_Kategori' => request('ID_Kategori'),
            'Nama_Barang' => request('Nama_Barang'),
            'Harga_Barang'=>request('Harga_Barang'),
            'Stok'=>request('Stok'),
            'Status'=>request('Status'),
            'Deskripsi'=>request('Deskripsi'),
            'gambar' => request('gambar')->getClientOriginalName(),
            'Berat'=>request('Berat'),
        ]);
  
        return redirect()->route('barang.index')->with('success', 'Data berhasil ditambahkan');
    }
  
    public function edit(barang $barangs){

        $produk = barang::all();
        $kategoris = kategori::all();
        
        return view('barang.edit', compact('barangs','produk','kategoris'));
    }
  
    public function update(barang $barangs, Request $request)
    {
     if($request->hasFile('gambar'))
      {
          $gambar = $request->file('gambar')->getClientOriginalName();
          $destination = base_path('public/uploadImage/');
          $request->file('gambar')->move($destination,$gambar);
      }
      else
      {
          $gambar = $barangs->gambar;
      }
  
         $barangs->update([
        
            'ID_Kategori' => request('ID_Kategori'),
            'Nama_Barang' => request('Nama_Barang'),
            'Harga_Barang'=>request('Harga_Barang'),
            'Stok'=>request('Stok'),
            'Status'=>request('Status'),
            'Deskripsi'=>request('Deskripsi'),
            'gambar' => $gambar,

        ]);
        return redirect()->route('barang.index')->with('success', 'Data berhasil diubah');
    }
  
    public function destroy(barang $barangs){
        $barangs->delete();
  
        return redirect()->route('barang.index')->with('success', 'Data berhasil dihapus');
    }

        public function trash()
    {
            // mengampil data barang yang sudah dihapus
            $barang = barang::onlyTrashed()->get();
            return view('barang.trash', ['barang' => $barang]);
    }

        public function kembalikan($id)
    {
            $barang = barang::onlyTrashed()->where('id',$id);
            $barang->restore();
            return redirect()->route('barang.trash')->with('success', 'Data berhasil dikembalikan');
    }

    public function hapus_permanen($id)
    {
            // hapus permanen data barang
            $barang = barang::onlyTrashed()->where('id',$id);
            $barang->forceDelete();
    
            return redirect()->route('barang.trash')->with('success', 'Data berhasil dihapus');
    }
}

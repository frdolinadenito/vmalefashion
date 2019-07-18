<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\kategori;

class KategoriController extends Controller
{
    public function index (Request $req){
        if($req->search == "") {
           $kategoris = kategori::paginate(env('PER_PAGE'));
            return view('kategori.index', compact('kategoris'));
        }else{
            $kategoris = kategori::where('Nama_Kategori','LIKE','%' .$req->search. '%')
                ->paginate(env('PER_PAGE'));
            $kategoris->appends($req->only('search'));
            return view ('kategori.index',compact('kategoris'));
        }
    }
  
   
    public function create()
    {
  
        return view('kategori.create');
    }
  
    public function store(Request $request)
    {
        $kategoris= kategori::all();
        kategori::create([
            'Nama_Kategori' => request('Nama_Kategori'),
        ]);
        return redirect()->route('kategori.index')->with('success', 'Data berhasil ditambahkan');
    }
  
    public function edit(kategori $kategoris){
  
        return view('kategori.edit', compact('kategoris'));
    }
  
    public function update(kategori $kategoris, Request $request)
    {
         $kategoris->update([
        
            'Nama_Kategori' => request('Nama_Kategori'),
        ]);
        return redirect()->route('kategori.index')->with('success', 'Data berhasil diubah');
    }
  
    public function destroy(kategori $kategoris){
        $kategoris->delete();
  
        return redirect()->route('kategori.index')->with('success', 'Data berhasil dihapus');
    }

    public function trash()
    {
            // mengampil data kategori yang sudah dihapus
            $kategori = kategori::onlyTrashed()->get();
            return view('kategori.trash', ['kategori' => $kategori]);
    }

        public function kembalikan($id)
    {
            $kategori = kategori::onlyTrashed()->where('id',$id);
            $kategori->restore();
            return redirect()->route('kategori.trash')->with('success', 'Data berhasil dikembalikan');
    }

    public function hapus_permanen($id)
    {
            // hapus permanen data kategori
            $kategori = kategori::onlyTrashed()->where('id',$id);
            $kategori->forceDelete();
    
            return redirect()->route('kategori.trash')->with('success', 'Data berhasil dihapus');
    }
}

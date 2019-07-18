<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\peran;
use Auth;

class PenggunaController extends Controller
{
    public function tampilPelanggan (Request $req){
        $idUser = Auth::user()->id;
        $users = User::find($idUser);
            return view('profil', compact('users'));
  
    }
  
    public function editPelanggan(User $user){
        $pengguna=User::all();
        return view('edit-akun', compact('pengguna','user'));
    }
  
    public function updatePelanggan(User $user)
    {
         $user->update([
            'nama' => request('nama'),
            'email'=>request('email'),
            'tanggalLahir'=>request('tanggalLahir'),
            'jenisKelamin'=>request('jenisKelamin'),
        ]);
        return redirect()->route('profil')->with('success', 'Data berhasil diubah');
    }

    public function tampilPegawai(){
        $idUser = Auth::user()->id;
        $users = User::find($idUser);
        $pegawai = User::where('ID_Peran','=','2')->get();
        return view('profil-pegawai', compact('pegawai','users'));
    }

    

    public function tampilPegawai_Pemilik (Request $req){
        $pegawais = User::all();
        if($req->search == "") {
            $pegawai = User::where('ID_Peran','=','2')->paginate(10);
             return view('pegawai.index', compact('pegawai'));
   
         }else{
             $pegawai = User::where ([
                 ['nama','LIKE','%' .$req->search. '%'],['ID_Peran','=','2']
             ])->paginate(10);
             $pegawai->appends($req->only('search'));
             return view ('pegawai.index',compact('pegawai'));
         }
    }

    public function createPegawai_Pemilik()
    {
        $peran = peran::all();
        
        return view('pegawai.create',compact('peran'));
    }
  
    public function RegistrasiPegawai(Request $request)
    {
         User::create([
            'ID_Peran'            =>('2'),
            'nama'               => request('nama'),
            'email'              => request('email'),
            'password'           => Hash::make(request('password')),
            'tanggalLahir'       => request('tanggalLahir'),
            'jenisKelamin'       => request('jenisKelamin'),
            'NIP'                => request('NIP'),
        ]);
        return redirect()->route('pegawai.index')->with('success', 'Data berhasil ditambahkan');
    }
  
    public function editPegawai_Pemilik(User $pegawais){

       
        $peg = User::where('id','=','$pegawais')->get();
        $get = User::find($pegawais);
        $tes = User::all();

        $peran = peran::all();
        
        return view('pegawai.edit', compact('pegawais','peran','peg','tes','get'));
    }
  
    public function updatePegawai_Pemilik(User $pegawais)
    {
         $pegawais->update([
            'nama' => request('nama'),
            'email'=>request('email'),
            'tanggalLahir'=>request('tanggalLahir'),
            'jenisKelamin'=>request('jenisKelamin'),
            'NIP' => request('NIP'),
        ]);
        return redirect()->route('pegawai.index')->with('success', 'Data berhasil diubah');
    }
  
    public function HapusPegawai_Pemilik(User $pegawais){
        $pegawais->delete();
  
        return redirect()->route('pegawai.index')->with('success', 'Data berhasil dihapus');
    }

    public function trash()
    {
            // mengampil data pegawai yang sudah dihapus
            $pegawai = User::onlyTrashed()->get();
            return view('pegawai.trash', ['pegawai' => $pegawai]);
    }

        public function kembalikan($id)
    {
            $pegawai = User::onlyTrashed()->where('id',$id);
            $pegawai->restore();
            return redirect()->route('pegawai.trash')->with('success', 'Data berhasil dikembalikan');
    }

    public function hapus_permanen($id)
    {
            // hapus permanen data pegawai
            $pegawai = User::onlyTrashed()->where('id',$id);
            $pegawai->forceDelete();
    
            return redirect()->route('barang.trash')->with('success', 'Data berhasil dihapus');
    }
}

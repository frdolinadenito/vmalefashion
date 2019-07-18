<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class barang1 extends Model
{
    protected $table = 'barang';

    protected $fillable =[
      'id',
      'ID_Kategori',
      'Nama_Barang',
      'Harga_Barang',
      'Stok',
      'Status',
      'Deskripsi',
      'Gambar',

    ];

    public function get_kategori()
    {
      return $this->belongsTo('App\kategori','ID_Kategori');
    }

    
      public function get_detil_transaksi(){
        return $this->hasMany('App\detil_transaksi');
      }

      public function get_ulasan(){
        return $this->hasMany('App\ulasan');
      }
}

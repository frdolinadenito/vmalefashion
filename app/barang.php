<?php

namespace App;
use App\kategori;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class barang extends Model
{
  use SoftDeletes;
    protected $table = 'barang';

    protected $fillable =[
      'id',
      'ID_Kategori',
      'Nama_Barang',
      'Harga_Barang',
      'Stok',
      'Status',
      'Deskripsi',
      'gambar',
      'Berat',

    ];

    protected $dates = ['deleted_at'];
    public function get_k()
    {
      return $this->belongsTo('App\kategori','ID_Kategori');
    }
}

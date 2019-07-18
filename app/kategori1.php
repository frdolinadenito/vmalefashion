<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kategori1 extends Model
{

    protected $table = 'kategori';

    protected $fillable =[
      'id',
      'Nama_Kategori',
      
    ];

    public function get_barang(){
      return $this->hasMany('App\barang');
    }

}

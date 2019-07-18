<?php

namespace App;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class kategori extends Model
{
  use SoftDeletes;
    protected $table = 'kategori';

    protected $fillable =[
      'id',
      'Nama_Kategori',
      
    ];
    protected $dates = ['deleted_at'];

    public function get_barang(){
      return $this->hasMany('App\barang','id');
    }
}

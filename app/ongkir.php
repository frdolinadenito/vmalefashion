<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ongkir extends Model
{

    protected $table = 'ongkir';

    protected $fillable =[
      'id',
      'Kota',
      'Tarif',
      

    ];

    

    public function get_ongkir(){
      return $this->hasMany('App\transaksi');
    }

}

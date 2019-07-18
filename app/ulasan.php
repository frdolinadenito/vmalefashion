<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ulasan extends Model
{

    protected $table = 'ulasan';

    protected $fillable =[
      'id',
      'Id_Barang',
      'Id_Pengguna',
      

    ];

    public function pengguna()
    {
      return $this->belongsTo('pengguna','local_key','parent_key');
    }

    public function barang()
    {
      return $this->belongsTo('barang','local_key','parent_key');
    }

    public function get_detil_ulasan(){
      return $this->hasMany('App\detil_ulasan');
    }

}

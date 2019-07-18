<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class peran extends Model
{

    protected $table = 'peran';

    protected $fillable =[
        'id',
        'namaPeran'
    ];

    public function get_pengguna(){
        return $this->hasMany('App\pengguna');
      }
    
      public function get_pegawai(){
        return $this->hasMany('App\pegawai');
      }
}

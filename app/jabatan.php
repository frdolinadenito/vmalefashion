<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jabatan extends Model
{

    protected $table = 'jabatan';

    protected $fillable =[
        'id',
        'Nama_Jabatan'
    ];

    
    
      public function get_pegawai(){
        return $this->hasMany('App\pegawai');
      }
}

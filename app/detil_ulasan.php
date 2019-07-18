<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detil_ulasan extends Model
{

    protected $table = 'detil_ulasan';

    protected $fillable =[
      'id',
      'ID_Ulasan',
      'ID_Pengguna',
      'Tanggal_Ulasan',
      'Ulasan',
      'Gambar',
      
    ];

    public function pengguna()
    {
      return $this->belongsTo('pengguna','local_key','parent_key');
    }

    public function ulasan()
    {
      return $this->belongsTo('ulasan','local_key','parent_key');
    }

}

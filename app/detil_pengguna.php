<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detil_pengguna extends Model
{
    protected $table = 'detil_pengguna';

    protected $fillable =[
      'id',
      'ID_Pengguna',
      'ID_Transaksi',
      'Nama_Penerima',
      'No_Telepon',
      'Kecamatan',
      'Kode_Pos',
      'Alamat_Lengkap',

    ];
}

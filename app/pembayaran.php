<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pembayaran extends Model
{

    protected $table = 'pembayaran';

    protected $fillable =[
      'id',
      'ID_Transaksi',
      'Nama',
      'Bank',
      'Jumlah',
      'Tanggal_Pembayaran',
      'Bukti_Pembayaran',
      

    ];

    public function transaksi()
    {
      return $this->belongsTo('transaksi','local_key','parent_key');
    }

    

}

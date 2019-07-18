<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detil_transaksi extends Model
{

    protected $table = 'detil_transaksi';

    protected $fillable =[
      'id',
      'ID_Transaksi',
      'ID_Barang',
      'Jumlah_Belanja',
      'Total_Pembelian',
      'Nama',
      'Harga_Satuan',
      'Nama_Kota',
      'Tarif',

    ];

    public function transaksi()
    {
      return $this->belongsTo('transaksi','local_key','parent_key');
    }

    public function barang()
    {
      return $this->belongsTo('barang','local_key','parent_key');
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\city;

class transaksi extends Model
{
    protected $table = 'transaksi';

    protected $fillable =[
        'id',
        'ID_Pengguna',
        'ID_Ongkir',
        'Tanggal_Pembelian',
        'Total_Harga',
        'Status_Pemesanan',
        'Resi_Pengiriman',
        'Nomor_Tagihan',
        'Jasa_Pengiriman',
        
    ];

    public function pengguna()
     {
       return $this->belongsTo('App\User','ID_Pengguna');
     }
     

    public function get_city()
    {
      return $this->belongsTo('App\city','ID_Ongkir');
    }
  

     public function ongkir()
     {
       return $this->belongsTo('ongkir','local_key','parent_key');
     }

     public function get_detil_transaksi(){
        return $this->hasMany('App\detil_transaksi');
      }

      public function get_pembayaran(){
        return $this->hasMany('App\pembayaran');
      }

     

}

<?php

namespace App;
use App\transaksi;

use Illuminate\Database\Eloquent\Model;

class city extends Model
{
    protected $table = 'city';

    protected $fillable =[
      'id',
      'name',
      'id_province',

    ];

  
}

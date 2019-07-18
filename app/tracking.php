<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tracking extends Model
{
    protected $table = 'tracking';

    protected $fillable =[
      'id',
      'jasa',
      'resi',

    ];
}

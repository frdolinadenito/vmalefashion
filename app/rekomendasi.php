<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rekomendasi extends Model
{
    protected $table = 'rekomendasi';

    protected $fillable =[
      'id',
      'sumber',
      'hasil',

    ];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class province extends Model
{
    protected $table = 'province';

    protected $fillable =[
      'id',
      'name',
      

    ];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pegawai extends Model
{
  protected $table = 'pegawai';

  protected $fillable =[
  'id',
  'ID_Peran',
  'ID_Jabatan',
  'NIP',
  
  
];

/**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
      'password', 'remember_token',
  ];

  public function get_peran(){
    return $this->belongsTo('App\peran','ID_Peran');
  }

  public function get_jabatan(){
    return $this->belongsTo('App\jabatan','ID_Jabatan');
  }

  

//   public function get_nota(){
//     return $this->hasMany('App\nota');
//   }
}

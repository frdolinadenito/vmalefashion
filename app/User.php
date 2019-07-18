<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Peran;
class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    protected $table = 'pengguna';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    protected $fillable = [
            'id',
            'ID_Peran',
            'nama',
            'email',
            'password',
            'tanggalLahir',
            'noTelepon',
            'alamat',
            'jenisKelamin',
            'NIP',
           
    ];

    protected $dates = ['deleted_at'];
    
    public function get_peran()
     {
       return $this->belongsTo('App\peran','ID_Peran');
     }


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}

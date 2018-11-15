<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Auth_mhs extends Authenticatable
{
    use Notifiable;
    
    protected $table = 'tb_mahasiswa';
    protected $primaryKey = 'nim'; //mengganti primary key default==id
    protected $fillable = [
    	'nim', 'nama', 'jurusan', 'fakultas','password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}

<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Auth_admin extends Authenticatable
{
    use Notifiable;
    
    protected $table = 'tb_admin';
    protected $fillable = [
        'nama','username', 'password','ket', 'ket2'
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
}

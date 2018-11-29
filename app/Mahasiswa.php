<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'tb_mahasiswa';
    protected $primaryKey = 'nim'; //mengganti primary key default==id
    protected $fillable = [
    	'nim', 'nama', 'jurusan', 'fakultas', 'th_angkatan','foto','password',
    ];
}

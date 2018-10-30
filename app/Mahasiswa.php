<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'tb_mahasiswa';

    protected $fillable = [
    	'nim', 'nama', 'jurusan', 'fakultas','password',
    ];
	
	function FKAdmin(){
		return $this->belongsTo(Admin::class);
	}

	function PKMahasiswa1() {
		return $this->hasMany(Balon::class);
	}
	function PKMahasiswa2() {
		return $this->hasMany(Pemilih::class);
	}
}

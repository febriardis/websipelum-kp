<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
	protected $table = 'tb_admin';

	protected $fillable = [
		'nama','username', 'password', 'ket', 'ket2'
	];

	protected $hidden = [
		'password', 'remember_token',
	];

	function FKAdmin1(){
		return $this->hasMany(Agenda::class);
	}

	function FKAdmin2(){
		return $this->hasMany(Balon::class);
	}

	function FKAdmin3(){
		return $this->hasMany(Mahasiswa::class);
	}

	function FKAdmin4(){
		return $this->hasMany(Nourut::class);
	}

	function FKAdmin5(){
		return $this->hasMany(Paslon::class);
	}

	function FKAdmin6(){
		return $this->hasMany(Pemilih::class);
	}

	function FKAdmin7(){
		return $this->hasMany(Tps::class);
	}

	function FKAdmin8(){
		return $this->hasMany(Voting::class);
	}
}

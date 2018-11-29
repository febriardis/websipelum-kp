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
		return $this->hasMany(AgendaAjuan::class);
	}
	function FKAdmin3(){
		return $this->hasMany(Kandidat::class);
	}
}

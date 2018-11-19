<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fakultas extends Model
{
    protected $table = 'tb_fakultas';
    protected $fillable = ['nm_fakultas'];

	function PKFakultas(){
		return $this->hasMany(Jurusan::class);
	}
	function PKFakultas2(){
		return $this->hasMany(TbOrganisasi::class);
	}
}

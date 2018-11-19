<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
	protected $table = 'tb_jurusan';
	protected $fillable = ['fak_id', 'nm_jurusan'];

    function FKJurusan(){
        return $this->belongsTo(Fakultas::class);
    }
   	function PKJurusan(){
		return $this->hasMany(TbOrganisasi::class);
	}
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    protected $table = 'tb_agenda';

	protected $fillable = [
		'admin_id',
		'nm_agenda', 
		'sistem_vote',
		'kat_jurusan',
		'kat_fakultas',
		'tgl_agenda', 
		'timeA1', 
		'timeA2', 
		'StartDaftarK', 
		'LastDaftarK', 
		'tgl_filtering', 
		'syaratketentuan'
	];

	function FKAgendaA(){
		return $this->belongsTo(Admin::class);
	}
	function PKAgenda1() { 
		return $this->hasMany(Pemilih::class);
	}
	function PKAgenda2() { 
		return $this->hasMany(Kandidat::class);
	}
	function PKAgenda3() { 
		return $this->hasMany(Voting::class);
	}
}

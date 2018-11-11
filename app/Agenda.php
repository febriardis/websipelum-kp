<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    protected $table = 'tb_agenda';

	protected $fillable = [
		'admin_id','nm_agenda', 'metodep','jurusan','tgl_agenda',
	];

	function PKAgendaA(){
		return $this->belongsTo(Admin::class);
	}

	function PKAgenda1() { 
		return $this->hasMany(Pemilih::class);//sebagai refer Pemilih
	}
	function PKAgenda2() { 
		return $this->hasMany(Tps::class);//sebagai refer Tps
	}
	function PKAgenda3() { 
		return $this->hasMany(Paslon::class);//sebagai refer Paslon
	}
	function PKAgenda4() { 
		return $this->hasMany(Balon::class);//sebagai refer Balon
	}
	function PKAgenda5() { 
		return $this->hasMany(Voting::class);//sebagai refer Balon
	}
}
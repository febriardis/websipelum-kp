<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AgendaAjuan extends Model
{
    protected $table='tb_agenda_ajuan';
    protected $fillable=[
    	'admin_id',
    	'nm_agenda',
    	'sistem_vote',
    	'file', 
    	'kat_jurusan', 
    	'kat_fakultas',
    	'tgl_agenda',
    	'timeA1', 
    	'timeA2',
    	'ket'
    ];

   	function FKAgendaAjuan() {
    	return $this->belongsTo(Admin::class);
    }
}

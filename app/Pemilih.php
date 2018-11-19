<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemilih extends Model
{
    protected $table = 'tb_pemilih';
    protected $fillable = [
        'nim','agenda_id','ket_vote',
    ];

    function PKPemilihA(){
        return $this->belongsTo(Admin::class);
    }
    
    function FKPemilih1() {
    	return $this->belongsTo(Mahasiswa::class);
    }

    function FKPemilih2() {
    	return $this->belongsTo(Agenda::class);
    }

}
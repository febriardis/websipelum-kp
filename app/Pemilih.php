<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemilih extends Model
{
    protected $table = 'tb_pemilih';
    protected $fillable = [
        'nim','nama','agenda_id','username', 'password', 'passwordshow','ket_vote',
    ];

    protected $hidden = [
        'password', 'remember_token',
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
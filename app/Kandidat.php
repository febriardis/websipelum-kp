<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kandidat extends Model
{
    protected $table = 'tb_kandidat';
    protected $fillable = ['nim','nama','foto','jurusan','angkatan','visi','misi'];

    function FKBalonA(){
        return $this->belongsTo(Admin::class);
    }

    function FKBalon1() {
    	return $this->belongsTo(Mahasiswa::class);
    }

    function FKBalon2() {
    	return $this->belongsTo(Agenda::class);
    }

    function PKBalon1() {
        return $this->hasMany(Voting::class);
    }
}

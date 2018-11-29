<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kandidat extends Model
{
    protected $table = 'tb_kandidat';
    protected $fillable = ['nim','nama','foto','jurusan','angkatan','visi','misi','keterangan'];

    function PKKandidat() {
        return $this->hasMany(Voting::class);
    }

    function FKKandidat1() {
    	return $this->belongsTo(Agenda::class);
    }

    function FKKanidat2() {
    	return $this->belongsTo(Mahasiswa::class);
    }
}

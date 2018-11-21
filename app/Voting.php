<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voting extends Model
{
    protected $table = 'tb_voting';
    protected $fillable = ['agenda_id','kandidat_id', 'jumlah'];

    function FKVoting1() {
    	return $this->belongsTo(Kandidat::class);
    }
    function FKVoting2() {
    	return $this->belongsTo(Agenda::class);
    }
}

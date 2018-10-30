<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voting extends Model
{
    protected $table = 'tb_voting';
    protected $table = ['agenda_id','nourut_id', 'jumlah'];

	function FKVotingA(){
		return $this->belongsTo(Admin::class);
	}

    function FKVoting1() {
    	return $this->belongsTo(Nourut::class);
    }
    function FKVoting2() {
    	return $this->belongsTo(Agenda::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrgBidang extends Model
{

	protected $table = 'tb_org_bidang';
	protected $fillable = ['org_id', 'nm_bidang'];

	function PKOrgBidang(){
		return $this->hasMany(OrgStrukBid::class);
	}

    function FKOrgBidang(){
    	return $this->belongTo(Organisasi::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrgStrukBid extends Model
{
    protected $table = 'tb_org_strukbid';
	protected $fillable = ['bidang_id', 'nm_penjabat', 'nm_jabatan', 'angkatan'];

    function FKOrgStrukBid(){
    	return $this->belongTo(OrgBidang::class);
    }
}

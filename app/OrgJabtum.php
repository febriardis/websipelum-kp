<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrgJabtum extends Model
{
	protected $table = 'tb_org_jabtum';
	protected $fillable = ['org_id', 'nm_jabatan', 'nm_penjabat'];

    function FKOrgJabtum(){
    	return $this->belongsTo(Organisasi::class);
    }
}

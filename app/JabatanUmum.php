<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JabatanUmum extends Model
{
	protected $table = 'tb_org_jabtum';
	protected $fillable = ['org_id', 'nm_jabatan', 'nm_penjabat'];

    function FKJabatanUmum(){
    	return $this->belongsTo(Organisasi::class);
    }
}

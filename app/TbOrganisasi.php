<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TbOrganisasi extends Model
{
	protected $table = 'tb_org';
	protected $fillable = ['fak_id','jur_id','ket_organisasi','nm_organisasi','visi','misi'];
    function FKTbOrganisasi1(){
        return $this->belongsTo(Fakultas::class);
    }
    function FKTbOrganisasi2(){
        return $this->belongsTo(Jurusan::class);
    }
}

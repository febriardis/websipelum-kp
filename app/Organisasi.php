<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organisasi extends Model
{
	protected $table = 'tb_org';
	protected $fillable = ['fak_id','jur_id','ket_organisasi','nm_organisasi','visi','misi'];
    
    function FKOrganisasi1(){
        return $this->belongsTo(Fakultas::class);
    }
    function FKOrganisasi2(){
        return $this->belongsTo(Jurusan::class);
    }

    function PKOrganisasi(){
    	return $this->hasMany(JabatanUmum::class);
    }
}
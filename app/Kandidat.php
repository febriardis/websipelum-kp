<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kandidat extends Model
{
    protected $table = 'tb_kandidat';
    protected $fillable = [
        'nama',
        'jen_kelamin',
        'tmp_lahir',
        'tgl_lahir',
        'nim',
        'jurusan',
        'fakultas',
        'foto',
        'agama',
        'no_hp',
        'email',
        'medsos1',
        'medsos2',
        'medsos3',
        'blog',
        'anak_ke',
        'jum_saudara',
        'asal_sma',
        'asal_daerah',
        'motto',
        'motivasi',
        'transkrip_nilai',
        'agenda_id',
        'visi',
        'misi',
        'riwayat_hidup',
        'keterangan'
    ];

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

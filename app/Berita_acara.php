<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Berita_acara extends Model
{
    protected $table='tb_beritaacara';
    protected $fillable=['id','admin_id','nm_agenda','sistem_vote','file','ket'];
}

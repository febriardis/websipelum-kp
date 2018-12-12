<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $table = 'tb_banner';
    protected $fillable = ['image', 'head_caption', 'body_caption'];
}

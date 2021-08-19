<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Filme extends Model
{
    protected $table = 'filmes';
    public $timestamps = false;
    protected $fillable = ['nome'];
}

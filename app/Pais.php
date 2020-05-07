<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    //
    protected $table = 'paises';
    protected $fillable = ['codigo_pais','nombre_pais'];
}

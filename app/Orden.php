<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
    //
    protected $table = 'ordenes';
    protected $fillable = ['id','numero','fecha','metodo_id','user_id','estado_id'];
}

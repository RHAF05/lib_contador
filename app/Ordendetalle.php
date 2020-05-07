<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ordendetalle extends Model
{
    //
    protected $table = 'ordenes_detalles';
    protected $fillable = ['id','precio','cantidad','producto_id','orden_id'];

    public function producto(){
    	return $this->hasOne('App\Producto','id','producto_id');
    }
}

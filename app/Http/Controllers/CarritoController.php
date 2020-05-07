<?php

namespace App\Http\Controllers;

use App\Orden;
use App\Ordendetalle;
use App\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class CarritoController extends Controller
{
    //Función constructor para inicializar el carrito
    public function __construct(){
    	if(!Session::has('carrito')){
    		Session::put('carrito',array());
    	}
    }

    //Función para mostrar el carrito
    public function mostrar(){
    	$carrito = Session::get('carrito');
    	return view('frontoffice.carrito',compact('carrito'));
    }

    //Función para agregar items al carrito
    public function agregar($id){
    	$carrito = Session::get('carrito');
        $producto = Producto::find($id);
    	$producto->cantcompra = 1;
    	$carrito[$producto->id] = $producto;
    	Session::put('carrito',$carrito);

    	return redirect()->route('carrito');
    }

    //Función para borrar un item del carrito
    public function borrar($id){
    	$carrito = Session::get('carrito');
    	unset($carrito[$id]);
    	Session::put('carrito',$carrito);
    	return redirect()->route('carrito');
    }

    //Función para vaciar el carrito
    public function vaciar(){
    	Session::forget('carrito');
    	return redirect()->route('carrito');
    }

    //Función para actualizar un item del carrito
    public function actualizar($id, $cantidad){
    	$carrito = Session::get('carrito');
        $producto = Producto::find($id);
        $carrito[$producto->id]->cantcompra = $cantidad;
        Session::put('carrito',$carrito);
        return redirect()->route('carrito');
    }

    //Función para guardar la orden
    public function ordenar(){
        $carrito = Session::get('carrito');
        if($carrito){


            $numero = Orden::max('numero')+1;
            $now = new \DateTime();
            $fecha = $now->format('Y-m-d h:m:s');


            $orden = new Orden();
            $orden->numero = $numero;
            $orden->fecha = $fecha;
            $orden->user_id = Auth::user()->id;
            $orden->estado_id = 1;
            $orden->metodo_id = 1;
            $orden->save();

            foreach($carrito as $producto){
                $orden_detalle = Ordendetalle::create([
                    // 'numero'=>$numero,
                    'precio'=>$producto->precio,
                    'cantidad'=>$producto->cantcompra,
                    'fecha'=>$fecha,
                    'producto_id'=>$producto->id,
                    'orden_id'=>$orden->id,
                    // 'idcupon'=>1,
                ]);
            }

            return redirect()->route('orden-detallada',$numero);
        }
    }

    //Función para mostrar detalles de la Orden
    public function ordenDetallada($numero){
        $orden = Orden::where('numero',$numero)->get()->first();
        $orden_detalle = Ordendetalle::where('orden_id',$orden->id)->get();
        return view('frontoffice.orden',compact(['orden','orden_detalle']));
    }
}

<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','frontoffice\PaginasController@inicio')->name('inicio');
Route::get('detalles/{id}','frontoffice\PaginasController@detalle')->name('producto.detalle');

Route::get('/productos/fetch_data', function () {
    // return view('backoffice.productos.index');
    return "RHAF";
});

Route::resource('/productos','backoffice\ProductosController');
Route::get('/productos/fetch_data','backoffice\ProductosController@fetch_data');
Route::get('/productos/{id}/inactivar','backoffice\ProductosController@inactivar')->name('productos.inactivar');
Route::get('/productos/{id}/activar','backoffice\ProductosController@activar')->name('productos.activar');
Route::get('/productos-pdf','backoffice\ProductosController@exportarPdf')->name('productos.exportarPdf');
Route::get('/productos-excel','backoffice\ProductosController@exportarExcel')->name('productos.exportarExcel');


Route::resource('/autores', 'backoffice\AutoresController');


Route::resource('/categorias', 'backoffice\CategoriasController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//Rutas para el carrito de compras
Route::get('/carrito','CarritoController@mostrar')->name('carrito');
Route::get('/carrito/agregar/{id}','CarritoController@agregar')->name('carrito-agregar');
Route::get('/carrito/vaciar','CarritoController@vaciar')->name('carrito-vaciar');
Route::get('/carrito/borrar/{id}','CarritoController@borrar')->name('carrito-borrar');
Route::get('carrito/actualizar/{id}/{cantidad?}','CarritoController@actualizar')->name('carrito-actualizar');

//Ruta para guardar una orden
Route::get('ordenar',['as'=>'ordenar','uses'=>'CarritoController@ordenar'])->middleware('auth');
Route::get('orden-detallada/{numero}',['as'=>'orden-detallada','uses'=>'CarritoController@ordenDetallada'])->middleware('auth');

<?php

use App\Http\Controllers\clienteController;
use App\Http\Controllers\productoController;
use App\Http\Controllers\proveedorController;
use App\Http\Controllers\prueba;
use Illuminate\Support\Facades\Route;
use Illuminate\HTTP\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('menu');
});

//Ruta para enviar mensaje por URL
Route::get('/nuevo', function(){
    return ("Hola mundo!");
});

//Ruta para mostrar una vista
Route::view('/vista','prueba');


//Ruta para enviar parámetros por medio de las rutas
Route::view('/vista','prueba',['variable'=>'Mercado Libre']);


//Ruta para llamar una vista desde un controllador
Route::get('/VistaDesdeControlador',[prueba::class, 'mostrar']);


//Ruta para recibir parámetros en URL
Route::get('nueva-vista',function(Request $request){return "Hola wenas".$request->get('variable');});

//Ruta para recibir parámetros en la URL por medio del controlador
Route::get('/parametros/{id}',[prueba::class, 'recibirParametros']);


//Grupo de rutas desde una vista
Route::prefix('/ruta')->group(function(){
    Route::name('ruta.')->group(function(){
        Route::get('/users',function(){
            return view('prueba',['variable'=>'Mercado pago']);
        })->name('users');
    });
    Route::get('/users/crear',[prueba::class,'create'])->name('users.create');
    Route::get('/users/show',[prueba::class,'show'])->name('users.show');
    Route::get('/users/edit',[prueba::class, 'edit'])->name('users.edit');
    Route::get('/users/delete',[prueba::class, 'destroy'])->name('users.destroy');
});


//Ruta para ir al index de proveedores, pasando la autentificación
Route::resource('/proveedores',proveedorController::class)->middleware('auth');

//Ruta para ir al index de productos, pasando la autentificación
Route::resource('/productos',productoController::class)->middleware('auth');

//Ruta para ir al index de clientes, pasando la autentificación
Route::resource('/clientes',clienteController::class)->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



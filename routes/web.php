<?php

use Illuminate\Support\Facades\Route;
//Importar la ruta para utilizar
use App\Http\Controllers\InicioController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ExpedienteController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\PacienteController;
use App\Models\Expediente;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::middleware(['auth'])->group(function(){
Route::get('/inicio', [InicioController::class, 'index']);
//Route::get('/inicio','App\Http\Controllers\InicioController@index');
Route::post('/CrearCliente', [ClienteController::class, 'CrearCliente']);
Route::get('/ver_clientes', [ClienteController::class, 'ver_clientes'])->name('ver_clientes');
Route::get('/show_cliente/{id}', [ClienteController::class, 'show_cliente']);
Route::get('/delete_cliente',[ClienteController::class, 'delete_cliente']);
Route::post('/update_cliente/{id}',[ClienteController::class, 'update_cliente'])->name('update_cliente');
Route::get('/ver_formulario', [ClienteController::class, 'ver_formulario']);
Route::post('/desactivar/{id}', [ClienteController::class, 'desactivar'])->name('desactivar');

//Rutas de pacientes
Route::get('/ver_pacientes', [PacienteController::class, 'ver_pacientes'])->name('ver_pacientes');
Route::get('/ver_formulario_paciente', [PacienteController::class, 'ver_formulario']);
Route::post('/crear_paciente', [PacienteController::class, 'crear_paciente']);

//Rutas de expedientes
Route::get('/ver_expediente', [ExpedienteController::class, 'ver_expediente'])->name('ver_expediente');
Route::get('/ver_formulario_expediente', [ExpedienteController::class, 'ver_formulario']);
Route::post('/crear_expediente', [ExpedienteController::class, 'crear_expediente']);
Route::get('/detalles/{id}',[ExpedienteController::class,'detalles'])->name('detalles');
Route::post('/guardar_expediente', [ExpedienteController::class, 'guardar_expediente']);
Route::post('/guardar_consulta', [ExpedienteController::class, 'guardar_consulta']);
Route::post('/guardar_pagos', [ExpedienteController::class, 'guardar_pagos']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});
Route::get('/pdf/{id}',[ExpedienteController::class,'pdf'])->name('pdf');

//Iventario
Route::get('/ver_inventario', [InventarioController::class, 'ver_inventario'])->name('ver_inventario');
Route::get('/cargar_inventario', [InventarioController::class, 'cargar_inventario'])->name('cargar_inventario');
Route::post('/crear_inventario', [InventarioController::class, 'crear_inventario']);
Route::post('/reponer_stock/{id}', [InventarioController::class, 'reponer_stock'])->name('reponer_stock');
Route::get('/entradas/{id}', [InventarioController::class, 'entradas'])->name('entradas');

//Medicamento
Route::post('/guardar_medicamento', [ExpedienteController::class, 'guardar_medicamento']);
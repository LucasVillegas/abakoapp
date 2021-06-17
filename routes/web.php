<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\TrabajadorController;
use App\Http\Controllers\ConductorController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\TipoServicioController;
use App\Http\Controllers\ServicioController;
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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/* Rutas de Gestion de Usuario */
Route::resource('usuarios', UserController::class)->names('usuarios');
/* Fin Rutas Usuarios */

/* Rutas de Gestio de Roles */
Route::resource('roles', RolController::class)->names('roles');
/* Fin Ruta Roles */

/* Rutas de Gestion de Clientes  */
Route::resource('clientes', ClienteController::class)->names('clientes');
Route::get('clientes_block/{id}', [ClienteController::class, 'block'])->name('clientes.block');
Route::get('clientes_activate/{id}', [ClienteController::class, 'activate'])->name('clientes.activate');
/* Fin Rutas Clientes  */

/* Rutas de Gestion de Trabajadores  */
Route::resource('trabajadores', TrabajadorController::class)->names('trabajadores');
Route::get('trabajadores_block/{id}', [TrabajadorController::class, 'block'])->name('trabajadores.block');
Route::get('trabajadores_activate/{id}', [TrabajadorController::class, 'activate'])->name('trabajadores.activate');
/* Fin Rutas Trabajadores  */

/* Rutas de Gestion de Conductor  */
Route::resource('conductores', ConductorController::class)->names('conductores');
Route::get('conductores_block/{id}', [ConductorController::class, 'block'])->name('conductores.block');
Route::get('conductores_activate/{id}', [ConductorController::class, 'activate'])->name('conductores.activate');
/* Fin Rutas Conductor */

/* Rutas de Gestion de Trabajadores  */
Route::resource('proveedores', ProveedorController::class)->names('proveedores');
Route::get('conductores_block/{id}', [ProveedorController::class, 'block'])->name('conductores.block');
Route::get('conductores_activate/{id}', [ProveedorController::class, 'activate'])->name('conductores.activate');
/* Fin Rutas Trabajadores  */

/* Rutas tipo servicio */
Route::resource('tipo_servicios', TipoServicioController::class)->names('tipo_servicios');
Route::get('tipo_servicios_block/{id}', [TipoServicioController::class, 'block'])->name('tipo_servicios.block');
Route::get('tipo_servicios_activate/{id}', [TipoServicioController::class, 'activate'])->name('tipo_servicios.activate');
/* Fin ruta Tipo servicio */

/* Rutas tipo servicio */
Route::resource('servicios', ServicioController::class)->names('servicios');
Route::get('servicios_block/{id}', [ServicioController::class, 'block'])->name('servicios.block');
Route::get('servicios_activate/{id}', [ServicioController::class, 'activate'])->name('servicios.activate');
/* Fin ruta Tipo servicio */
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;
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
/*
Route::get('/empleado', function () {
    return view('empleado.index');
});
//Trabajar con una clase especifica
Route::get('/empleado/create', [EmpleadoController::class,'create']);
*/

//Trabajar con todas las URLS DE TODAS LAS CLASES  || Restringuiendo si no existe la autenticación
Route::resource('empleado', EmpleadoController::class)->middleware('auth');
Auth::routes(['register' => false, 'reset' => false]);

Route::get('/home', [EmpleadoController::class, 'index'])->name('home');

//Cuando sea autenticado, me redireccione al index, osea el CRUD
Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [EmpleadoController::class, 'index'])->name('home');
});

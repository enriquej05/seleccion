<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [App\Http\Controllers\ActividadController::class, 'index'])->name('home');
Route::get('detalleactividad/edit/{id}/{dependencia}', [App\Http\Controllers\ActividadController::class, 'edit'])->name('detalleactividad.edit');
Route::put('detalleactividad/update/{id}', [App\Http\Controllers\ActividadController::class, 'update'])->name('detalleactividad.update');

// Route::get('detalleactividad/edit/{id}','ActividadController@edit');
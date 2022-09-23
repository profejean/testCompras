<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SelectionCowController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ProductoController;

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
    return view('login');
});

Route::post('login', [App\Http\Controllers\UsuarioController::class, 'login'])->name('login');

Route::post('register', [App\Http\Controllers\UsuarioController::class, 'register'])->name('register');

Route::post('comprar', [App\Http\Controllers\ProductoController::class, 'comprar'])->name('comprar');

Route::get('facturas', [App\Http\Controllers\ProductoController::class, 'facturas'])->name('facturas');

Route::get('inicio', [App\Http\Controllers\UsuarioController::class, 'inicio'])->name('inicio');



/* Otro proyecto de vacas */


Route::get('selection_cow', [App\Http\Controllers\SelectionCowController::class, 'index'])->name('selection_cow');

Route::post('/selection/cow/add', [App\Http\Controllers\SelectionCowController::class, 'selected'])->name('selection_cow_add');

Route::get('cow_combined', [App\Http\Controllers\SelectionCowController::class, 'cow_combined'])->name('cow_combined');

Route::get('prediction', [App\Http\Controllers\SelectionCowController::class, 'prediction'])->name('prediction');



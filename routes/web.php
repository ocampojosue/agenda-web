<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/evento', [App\Http\Controllers\EventController::class, 'index']);
Route::post('/evento/agregar', [App\Http\Controllers\EventController::class, 'store']);
Route::get('/evento/mostrar/', [App\Http\Controllers\EventController::class, 'show']);
Route::post('/evento/editar/{id}', [App\Http\Controllers\EventController::class, 'edit']);
Route::post('/evento/actualizar/{evento}', [App\Http\Controllers\EventController::class, 'update']);
Route::post('/evento/borrar/{id}', [App\Http\Controllers\EventController::class, 'destroy']);

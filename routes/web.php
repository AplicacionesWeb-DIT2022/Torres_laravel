<?php

use Illuminate\Support\Facades\Route;
use app\Http\Controllers\TodosController;
use App\Http\Controllers\JugadorController;


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

Route::get('/services', function () {

    return view('todos.index');
});

// Route::get('/jugadores', function () {

//     return view('jugadores.index');
// });

// Route::get('/jugador/create',[JugadorController::class,'create']);


#Route::post('todos', [TodosController::class,'save'])->name('todos');
Route::resource('jugador',JugadorController::class);
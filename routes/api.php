<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JugadorController;
use App\Http\Controllers\ClubController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/jugadores',[JugadorController::class,'indexApi']); //todos los jugadores

Route::get('jugadores/show/{id}',[JugadorController::class,'showApi']); //todos los jugadores

Route::post('/jugadores', [JugadorController::class,'storeApi']); //Guardar jugadores

Route::put('/jugadores/update/{id}', [JugadorController::class,'updateApi']); //actualizar

Route::delete('/jugadores/destroy/{id}', [JugadorController::class,'destroyApi']); // eliminar


Route::get('/club/show/{id}',[ClubController::class,'showApi']); //todos los jugadores


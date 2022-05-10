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

Route::get('/jugadores',[JugadorController::class,'index']); //todos los jugadores

Route::get('/jugadores/show/{id}',[JugadorController::class,'show']); //todos los jugadores

Route::post('/jugadores', [JugadorController::class,'store']); //Guardar jugadores

Route::put('/jugadores/update/{id}', [ArticuloController::class,'update']); //actualizar

Route::delete('/jugadores/destroy/{id}', [ArticuloController::class,'destroy']); // eliminar

Route::get('/club/show/{id}',[ClubController::class,'show']); //todos los jugadores
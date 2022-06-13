<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JugadorController;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\TorneoController;

use App\Http\Controllers\TorneoClubController;

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
//                      JUGADORES

Route::get('/jugadores',[JugadorController::class,'indexApi']); //todos los jugadores

Route::get('jugadores/show/{id}',[JugadorController::class,'showApi']); //todos los jugadores

Route::post('/jugadores', [JugadorController::class,'storeApi']); //Guardar jugadores

Route::put('/jugadores/update/{id}', [JugadorController::class,'updateApi']); //actualizar

Route::delete('/jugadores/destroy/{id}', [JugadorController::class,'destroyApi']); // eliminar

//                         CLUB
Route::get('/club/show/{id}',[ClubController::class,'showApi']); //todos los clubes

Route::get('/club',[ClubController::class,'indexApi']); //todos los clubes

Route::post('/club', [ClubController::class,'storeApi']); //Guardar clubes

Route::put('/club/update/{id}', [ClubController::class,'updateApi']); //actualizar

Route::delete('/club/destroy/{id}', [ClubController::class,'destroyApi']); // eliminar


//                          Torneo
Route::get('/torneo/show/{id}',[TorneoController::class,'showApi']); //todos los Torneo

Route::get('/torneo',[TorneoController::class,'indexApi']); //todos los Torneo

Route::post('/torneo', [TorneoController::class,'storeApi']); //Guardar Torneo

Route::put('/torneo/update/{id}', [TorneoController::class,'updateApi']); //actualizar

Route::delete('/torneo/destroy/{id}', [TorneoController::class,'destroyApi']); // eliminar


//                          Club_campeonato
Route::get('/torneoClub/show/{id}',[TorneoClubxController::class,'showApi']); //todos los Club_torneo

Route::get('/torneoClub',[TorneoClubController::class,'indexApi']); //todos los Club_torneo

Route::post('/torneoClub', [TorneoClubController::class,'storeApi']); //Guardar Club_torneo

Route::put('/torneoClub/update/{id}', [TorneoClubController::class,'updateApi']); //actualizar

Route::delete('/torneoClub/destroy/{id}', [TorneoClubController::class,'destroyApi']); // eliminar





<?php
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use app\Http\Controllers\TodosController;
use App\Http\Controllers\JugadorController;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\TorneoController;
use App\Http\Controllers\TorneoClubController;
use App\Http\Controllers\HomeController;


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
    return view('todos.inicio');
    //return view('auth.login');
});

Route::get('/services', function () {

    return view('todos.inicio');
});

#Route::post('todos', [TodosController::class,'save'])->name('todos');
Route::resource('jugador',JugadorController::class)->middleware('auth');

Auth::routes(['reset'=>false]);

#                       Route Jugador


Route::get('/home', [JugadorController::class, 'index'])->name('home');
Route::get('/search', [JugadorController::class, 'search']);


Route::group(['middleware'=> 'auth'],function(){
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/jugadores/pdf',[JugadorController::class, 'pdf']) ->name('jugadores.pdf');
});

#                       Route Club

Route::resource('club', App\Http\Controllers\ClubController ::class);

// Route::get('/club/edit/{id}/',[ClubController::class,'edit']); //todos los jugadores

Route::get('/club/show/{id}',[ClubController::class,'show']); //todos los jugadores


#                       Route Torneo

#Route::get('/torneo', TorneoController::class,'index')->name('home');

Route::resource('/torneo',TorneoController::class)->middleware('auth');

Route::resource('/torneo', App\Http\Controllers\TorneoController ::class);



#                       Route torneoClub

Route::resource('/torneoClub',TorneoClubController::class)->middleware('auth');

Route::resource('/torneoClub', App\Http\Controllers\TorneoClubController ::class);

Route::get('/torneoClub/show/{id}',[TorneoClubController::class,'show']); //todos los jugadores

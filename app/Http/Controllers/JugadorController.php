<?php

namespace App\Http\Controllers;

use App\Models\Jugador;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

#use App\http\Controllers\JugadorController;

class JugadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['jugadores']= Jugador::paginate(5);
        return view('jugador.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        //
        return view('jugador.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        #$datosJugador = request()-> all();
        $datosJugador = request()->except('_token');
        if ($request->hasFile('Foto')){
            #si hay foto alteramos el campo usamos el nombre 
            $datosJugador['Foto'] = $request->file('Foto')->store('uploads','public');
        }
        Jugador::insert($datosJugador);
        return response()->json($datosJugador);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jugador  $jugador
     * @return \Illuminate\Http\Response
     */
    public function show(Jugador $jugador)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jugador  $jugador
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jugador= Jugador::findOrFail($id);
        return view('jugador.edit', compact('jugador'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jugador  $jugador
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        
        $datosJugador = request()->except(['_token','_method']);
        if ($request->hasFile('Foto')){
            $jugador= Jugador::findOrFail($id);
            Storage::delete('public/'.$jugador->Foto);
            #si hay foto alteramos el campo usamos el nombre 
            $datosJugador['Foto'] = $request->file('Foto')->store('uploads','public');
        }
        #actualizando base de datos
        Jugador::where('id','=',$id) ->update($datosJugador);
        $jugador= Jugador::findOrFail($id);
        
        return view('jugador.edit', compact('jugador'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jugador  $jugador
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Jugador::destroy($id);
        return redirect('jugador');
    }
}

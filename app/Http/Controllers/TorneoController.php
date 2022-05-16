<?php

namespace App\Http\Controllers;

use App\Models\Torneo;
use Illuminate\Http\Request;

class TorneoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['torneos']= Torneo::paginate(5);
        return view('torneo.index', $datos);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('torneo.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator=[
            'Nombre'=> 'required|string|max:100',
            'anio'=> 'required|string|max:100',
        ];
        $mensaje=[
            'required'=> 'El :attribute es requerido', 
        ];
        $this->validate($request,$validator,$mensaje);
        //
        $datosTorneo = request()->except('_token');
        Torneo::insert($datosTorneo);
        return redirect('torneo')->with('mensaje','Torneo se cargo correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Torneo  $torneo
     * @return \Illuminate\Http\Response
     */
    public function show(Torneo $torneo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Torneo  $torneo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $torneo = Torneo::findOrFail($id);
        return view('torneo.edit', compact('torneo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Torneo  $torneo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        //Validando datos 
        $validator=[
            'Nombre'=> 'required|string|max:100',
            'anio' => 'required|string|max:100',
        ];
        $mensaje=[
            'required'=> 'El :attribute es requerido',
        ];
        $this->validate($request,$validator,$mensaje);

        #Guardo los datos en la variable datosJugador
        $datosTorneo = request()->except(['_token','_method']);
        #Pregunto si existe
        #actualizando base de datos
        Torneo::where('id','=',$id) ->update($datosTorneo);
        $torneo= Torneo::findOrFail($id);
        
        //return view('jugador.edit',compact('jugador') );

        return redirect('torneo')->with('mensaje','Torneo actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Torneo  $torneo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $torneo= Torneo::findOrFail($id);
            Torneo::destroy($id);

        return redirect('torneo')->whit('mensaje','Torneo borrado correctamente');

    }
}

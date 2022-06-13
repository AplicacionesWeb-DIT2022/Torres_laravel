<?php

namespace App\Http\Controllers;

use App\Models\TorneoClub;
use Illuminate\Http\Request;
use App\Models\Club;
use App\Models\Torneo;
use Illuminate\Support\Facades\Log;

class TorneoClubController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      

        $datos['torneos'] = Torneo::paginate();
        Log::debug($datos);
        return view('torneo.index', $datos);

    }
    public function search(){
        $torneo_buscar= $_GET['query'];
        $torneos = Torneo::where('Nombre','LIKE', '%'.$torneo_buscar.'%')->paginate(100);
        //$jugadores = Jugador::where('Equipo','LIKE', '%'.$equipos_buscar.'%')->paginate(100);

        return view('torneoClub.index', compact('torneos'));   
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $club = Club::all();   
        return view('torneoClub.crear', compact('club'));
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
            'Anio'=> 'required|integer',
        ];
        $mensaje=[
            'required'=> 'El :attribute es requerido',
            'max' => 'El :attribute supera el maximo posible',
            'integer' => 'El :attribute no debe contener letras',
            
            //'Foto.required' => 'La Foto es requerida' 
        ];
        $this->validate($request,$validator,$mensaje);

        $datosTorneo = [
            'Nombre' => $request->get('Nombre'),
            'Anio' =>  $request->get('Anio')
        ];

       
        //Torneo creado,
        $torneo = new Torneo;
        $torneo->Nombre= $datosTorneo['Nombre'];
        $torneo->Anio= $datosTorneo['Anio'];
        $torneo->save();
        //       ClubCampeonato::insert($datosClubes->id);        
        $torneo->club()->attach(array_values($request->get('Equipos')));
        return redirect('torneoClub')->with('mensaje','Club se cargo correctamente');
        //return view('torneoClub.show',compact('torneo'));
        //return redirect('club', compact('datosClubes'))->with('mensaje','Club se cargo correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\torneoClub  $torneoClub
     * @return \Illuminate\Http\Response
     */
    public function show($idTorneo)
    {
        $equipos = TorneoClub::select('Equipo')->where('Torneo',$idTorneo)->get();
        $torneo = Torneo::find($idTorneo); //datos del torneo 
        $equipos= $torneo->club;
        return view('torneoClub.show',compact('torneo','equipos'));
 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\torneoClub  $torneoClub
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
     * @param  \App\Models\torneoClub  $torneoClub
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $validator = [
            'Nombre' => 'required|string|max:100',
            'Anio' => 'required|string|max:100'
        ];
        $mensaje = [
            'required' => 'El :attribite es requerido'
        ];
        this->validate($request, $validator, $mensaje);
        $datosTorneo = request()->except(['_token','_method']);
        Torneo::where('id','=',$id)->update($datosTorneo);
        $torneo= Torneo::findOrFail($id);
        return redirect('torneo')->with('mensaje','Torneo actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\torneoClub  $torneoClub
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $torneo = Torneo::find($id)->delete();

        return redirect()->route('torneoClub.index')
            ->with('success', 'Torneo eliminado correctamente');

    }
}

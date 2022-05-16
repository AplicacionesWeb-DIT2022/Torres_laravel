<?php

namespace App\Http\Controllers;

use App\Models\Club_campeonato;
use Illuminate\Http\Request;
use App\Models\Club;
use App\Models\Torneo;
use Illuminate\Support\Facades\Log;

class ClubCampeonatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['torneos']= Torneo::paginate(5);
        return view('club_torneo.index', $datos);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $club = Club::all();   
        return view('club_torneo.crear', compact('club'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datosTorneo = [
            'Nombre' => $request->get('Nombre'),
            'anio' =>  $request->get('anio')
        ];
       
        //Torneo creado,
        $torneo = new Torneo;
        $torneo->Nombre= $datosTorneo['Nombre'];
        $torneo->anio= $datosTorneo['anio'];
        $torneo->save();
        //       ClubCampeonato::insert($datosClubes->id);        
        $torneo->club()->attach(array_values($request->get('Equipos')));
        return redirect('clubTorneo')->with('mensaje','Club se cargo correctamente');
        //return view('club_torneo.show',compact('torneo'));
        //return redirect('club', compact('datosClubes'))->with('mensaje','Club se cargo correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\club_campeonato  $club_campeonato
     * @return \Illuminate\Http\Response
     */
    public function show($idTorneo)
    {
        $torneo = Torneo::find($idTorneo);
        Log::debug($torneo);
        // $clubes= cluborneo::where('Torneo',$campeonato->$club)->get();
        // $club = Club::find($id);
        // $jugadores= Jugador::where('Equipo',$club->id)->get();
        #return ($club, $jugadores)-> tojson();
        return view('club_torneo.show',compact('torneo'));
 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\club_campeonato  $club_campeonato
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
     * @param  \App\Models\club_campeonato  $club_campeonato
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $validator = [
            'Nombre' => 'required|string|max:100',
            'anio' => 'required|string|max:100'
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
     * @param  \App\Models\club_campeonato  $club_campeonato
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $torneo = Torneo::find($id)->delete();

        return redirect()->route('clubTorneo.index')
            ->with('success', 'Torneo eliminado correctamente');

    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Models\Jugador;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
/**
 * Class Club Controller
 * @package App\Http\Controllers
 */
class ClubController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['clubes']= Club::paginate(5);
        return view('club.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('club.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        //Validando datos
        $validator=[
            'Nombre'=> 'required|string|max:100',
            'Escudo'=> 'required|max:100000|mimes:jpeg,png,jpg',
        ];
        $mensaje=[
            'required'=> 'El :attribute es requerido',
            'Escudo.required' => 'El escudo es requerido' 
        ];
        $this->validate($request,$validator,$mensaje);
        //
        $datosClubes = request()->except('_token');
        
        if ($request->hasFile('Escudo')){
            #si hay foto alteramos el campo usamos el nombre 
            $datosClubes['Escudo'] = $request->file('Escudo')->store('uploads','public');
        }
        Club::insert($datosClubes);
        return redirect('club')->with('mensaje','Club se cargo correctamente');
    }
    
    public function show($id)
    {
        $club = Club::find($id);
        $jugadores= Jugador::where('Equipo',$club->id)->get();
        #return ($club, $jugadores)-> tojson();
        return view('club.show',compact('club','jugadores'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function showApo($id)
    {
        $club = Club::find($id);
        $jugadores= Jugador::where('Equipo',$club->id)->get();
        #return ($club, $jugadores)-> tojson();
        return response()->json([
            'Club' => $club,
            'Jugadores' => $jugadores,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $club = Club::findOrFail($id);
        return view('club.edit', compact('club'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Club $Club
     * @return \Illuminate\Http\Response
     */
   /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jugador  $jugador
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        //Validando datos 
        $validator=[
            'Nombre'=> 'required|string|max:100',
        ];
        $mensaje=[
            'required'=> 'El :attribute es requerido',
        ];
        if ($request->hasFile('Escudo')){
            $validator=['Escudo'=> 'required|max:100000|mimes:jpeg,png,jpg',];
            $mensaje=[
                'Escudo.required' => 'Es escudo es requerido', 
            ];
        }
        $this->validate($request,$validator,$mensaje);
        Log::debug($request->toArray());
        #Guardo los datos en la variable datosJugador
        $datosClub = request()->except(['_token','_method']);
        #Pregunto si existe
        if ($request->hasFile('Escudo')){
            
            $club= Club::findOrFail($id);
            Storage::delete('public/'.$club->Foto);
            #si hay foto alteramos el campo usamos el nombre 
            $datosClub['Escudo']=$request->file('Escudo')->store('uploads','public');
        }
        #actualizando base de datos
        Club::where('id','=',$id) ->update($datosClub);
        $club= Club::findOrFail($id);
        
        //return view('jugador.edit',compact('jugador') );

        return redirect('club')->with('mensaje','Club actualizado correctamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $club = Club::find($id)->delete();

        return redirect()->route('club.index')
            ->with('success', 'Club eliminado correctamente');
    }


    //  A
    //  P
    //  I
    //  S


    public function indexApi()
    {
        $datos['clubes']= Club::paginate(5);
        return $datos-> tojson();  
        //return view('club.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createApi()
    {
        return view('club.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function storeApi(Request $request)
    {   
        //Validando datos
        $validator=[
            'Nombre'=> 'required|string|max:100',
            'Escudo'=> 'required|max:100000|mimes:jpeg,png,jpg',
        ];
        $mensaje=[
            'required'=> 'El :attribute es requerido',
            'Escudo.required' => 'El escudo es requerido' 
        ];
        $this->validate($request,$validator,$mensaje);
        //
        $datosClubes = request()->except('_token');
        if ($request->hasFile('Escudo')){
            #si hay foto alteramos el campo usamos el nombre 
            $datosClubes['Escudo'] = $request->file('Escudo')->store('uploads','public');
        }
        Club::insert($datosClubes);
        return redirect('club')->with('mensaje','Club se cargo correctamente');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function showApi($id)
    {
        $club = Club::find($id);
        $jugadores= Jugador::where('Equipo',$club->id)->get();
        #return ($club, $jugadores)-> tojson();
        return response()->json([
            'Club' => $club,
            'Jugadores' => $jugadores,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function editApi($id)
    {
        $club = Club::findOrFail($id);
        return $club-> tojson();  

        //return view('club.edit', compact('club'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Club $Club
     * @return \Illuminate\Http\Response
     */
   /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jugador  $jugador
     * @return \Illuminate\Http\Response
     */
    public function updateApi(Request $request, $id)
    {

        //Validando datos 
        $validator=[
            'Nombre'=> 'required|string|max:100',
        ];
        $mensaje=[
            'required'=> 'El :attribute es requerido',
        ];
        if ($request->hasFile('Escudo')){
            $validator=['Escudo'=> 'required|max:100000|mimes:jpeg,png,jpg',];
            $mensaje=[
                'Escudo.required' => 'Es escudo es requerido', 
            ];
        }
        $this->validate($request,$validator,$mensaje);

        #Guardo los datos en la variable datosJugador
        $datosClub = request()->except(['_token','_method']);
        #Pregunto si existe
        if ($request->hasFile('Escudo')){
            
            $club= Club::findOrFail($id);
            Storage::delete('public/'.$club->Foto);
            #si hay foto alteramos el campo usamos el nombre 
            $datosClub['Escudo']=$request->file('Escudo')->store('uploads','public');
        }
        #actualizando base de datos
        Club::where('id','=',$id) ->update($datosClub);
        $club= Club::findOrFail($id);
        
        //return view('jugador.edit',compact('jugador') );

        return redirect('club')->with('mensaje','Club actualizado correctamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroyApi($id)
    {
        $club = Club::find($id)->delete();

        return redirect()->route('club.index')
            ->with('success', 'Club eliminado correctamente');
    }
    
}

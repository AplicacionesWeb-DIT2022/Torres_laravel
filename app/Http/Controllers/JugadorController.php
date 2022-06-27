<?php

namespace App\Http\Controllers;

use App\Models\Jugador;

use App\Models\Club;

use PDF;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage ;

use Illuminate\Support\Facades\Log ;
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
        $jugadores= Jugador::paginate(10);
        $cantidad = Jugador::count();
        return view('jugador.index', compact('jugadores','cantidad'));
    }

    public function search(){
        $jugadores_buscar= $_GET['query'];
        Log::debug($jugadores_buscar);
        $jugadores = Jugador::where('Dni','LIKE', '%'.$jugadores_buscar.'%')->paginate(10);
        $cantidad = Jugador::where('Dni','LIKE', '%'.$jugadores_buscar.'%')->count();
        return view('jugador.index', compact('jugadores','cantidad'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function laravel()
    {
        return view('inicio');
    }

    public function pdf()
    {
        $jugadores = Jugador::paginate();
        $pdf = PDF::loadView('jugador.pdf',['jugadores'=>$jugadores]);

        // return $pdf->stream();

        return $pdf->download('___jugadores.pdf');
       //return view('jugador.pdf',compact('jugadores'));
    }
    public function create()
    {
        //
        $datos['club']= Club::all();
        return view('jugador.crear',$datos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        //Validando datos
        $validator=[
            'Nombre'=> 'required|string|max:100',
            'Apellido'=> 'required|string|max:100',
            'Equipo'=> 'required|string|max:100',
            'Foto'=> 'max:100000|mimes:jpeg,png,jpg',
            'Dni'=> 'required|unique:jugadors|integer|max:100000000',
        ];
        $mensaje=[
            'required'=> 'El :attribute es requerido',
            'max' => 'El :attribute supera los 9 numeros',
            'unique' => 'El :attribute pertence a otro jugador',
            'integer' => 'El :attribute no debe contener letras',
            
            //'Foto.required' => 'La Foto es requerida' 
        ];
        $this->validate($request,$validator,$mensaje);

        //
        #$datosJugador = request()-> all();
        $datosJugador = request()->except('_token');
        if ($request->hasFile('Foto')){
            #si hay foto alteramos el campo usamos el nombre 
            $datosJugador['Foto'] = $request->file('Foto')->store('uploads','public');
        }else{
            $datosJugador['Foto'] = 'club/avatar.png';
        }
        Jugador::insert($datosJugador);
        return redirect('jugador')->with('mensaje','Jugador se cargo correctamente');
        // return response()->json($datosJugador);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jugador  $jugador
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        #buscamos el registro que me mandaron en el id
        $jugador= Jugador::findOrFail($id);
        $club= Club::all();
        return view('jugador.edit', compact('jugador','club'));
    }

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
            'Apellido'=> 'required|string|max:100',
            'Equipo'=> 'required|string|max:100',
            'Dni'=> 'required|max:100',
        ];
        $mensaje=[
            'required'=> 'El :attribute es requerido',
        ];
        if ($request->hasFile('Foto')){
            $validator=['Foto'=> 'required|max:100000|mimes:jpeg,png,jpg',];
            $mensaje=[
                'Foto.required' => 'La Foto es requerida', 
            ];
        }
        $this->validate($request,$validator,$mensaje);

        #Guardo los datos en la variable datosJugador
        $datosJugador = request()->except(['_token','_method']);
        #Pregunto si existe
        if ($request->hasFile('Foto')){
            $jugador= Jugador::findOrFail($id);
            if ($jugador->Foto != 'club/avatar.png'){
                Log::debug("No deberia entrar borro foto");
                Log::debug($jugador->Foto);
                Storage::delete('public/'.$jugador->Foto);
            }
            Log::debug("borrar foto");
            
            Log::debug($jugador->Foto);
            #si hay foto alteramos el campo usamos el nombre 
            $datosJugador['Foto']=$request->file('Foto')->store('uploads','public');
        }
        #actualizando base de datos
        Jugador::where('id','=',$id) ->update($datosJugador);
        $jugador= Jugador::findOrFail($id);
        
        //return view('jugador.edit',compact('jugador') );
        return redirect()->route('jugador.index')
        ->with('success', 'Jugador modificado correctamente'); 
        //return redirect('jugador')->with('mensaje','Jugador actualizado correctamente');
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
        $jugador= Jugador::findOrFail($id);
        if(Storage::delete('public/'.$jugador->Foto)){
            Jugador::destroy($id);
        }

        return redirect()->route('jugador.index')
        ->with('success', 'Jugador eliminado correctamente'); 
        
        //redirect('/jugador')->whit('mensaje','Empleado borrado correctamente');
    }

    // ##################APIS###############

    //##########################################

    public function indexApi()
    {
        //
        $datos= Jugador::all();
        return $datos-> tojson();
        //return view('jugador.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function createApi()
    {
        //
        $datos['club']= Club::all();
        return $datos-> tojson();
        //return view('jugador.crear',$datos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeApi(Request $request)
    {   
        //Validando datos
        $validator=[
            'Nombre'=> 'required|string|max:100',
            'Apellido'=> 'required|string|max:100',
            'Equipo'=> 'required|string|max:100',
            'Foto'=> 'required|max:100000|mimes:jpeg,png,jpg',
            'Dni'=> 'required|max:100',
        ];
        $mensaje=[
            'required'=> 'El :attribute es requerido',
            'Foto.required' => 'La Foto es requerida' 
        ];
        $this->validate($request,$validator,$mensaje);

        //
        #$datosJugador = request()-> all();
        $datosJugador = request()->except('_token');
        if ($request->hasFile('Foto')){
            #si hay foto alteramos el campo usamos el nombre 
            $datosJugador['Foto'] = $request->file('Foto')->store('uploads','public');
        }
        Jugador::insert($datosJugador);
        //return redirect('jugador')->with('mensaje','Jugador se cargo correctamente');
        return response()->json($datosJugador);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jugador  $jugador
     * @return \Illuminate\Http\Response
     */
    public function showApi($id)
    {
        #buscamos el registro que me mandaron en el id
        $jugador= Jugador::findOrFail($id);
        return $jugador-> tojson();        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jugador  $jugador
     * @return \Illuminate\Http\Response
     */
    public function editApi($id)
    {
        #buscamos el registro que me mandaron en el id
        $jugador= Jugador::findOrFail($id);
        $club= Club::all();
        return response()->json([
            'Club' => $club,
            'Jugadores' => $jugador,
        ]);
        //return view('jugador.edit', compact('jugador','club'));
    }

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
            'Apellido'=> 'required|string|max:100',
            'Equipo'=> 'required|string|max:100',
            'Dni'=> 'required|max:100',
        ];
        $mensaje=[
            'required'=> 'El :attribute es requerido',
        ];
        if ($request->hasFile('Foto')){
            $validator=['Foto'=> 'required|max:100000|mimes:jpeg,png,jpg',];
            $mensaje=[
                'Foto.required' => 'La Foto es requerida', 
            ];
        }
        $this->validate($request,$validator,$mensaje);

        #Guardo los datos en la variable datosJugador
        $datosJugador = request()->except(['_token','_method']);
        #Pregunto si existe
        if ($request->hasFile('Foto')){
            
            $jugador= Jugador::findOrFail($id);
            Storage::delete('public/'.$jugador->Foto);
            #si hay foto alteramos el campo usamos el nombre 
            $datosJugador['Foto']=$request->file('Foto')->store('uploads','public');
        }
        #actualizando base de datos
        Jugador::where('id','=',$id) ->update($datosJugador);
        $jugador= Jugador::findOrFail($id);
        
        //return view('jugador.edit',compact('jugador') );

        return redirect('jugador')->with('mensaje','Jugador actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jugador  $jugador
     * @return \Illuminate\Http\Response
     */
    public function destroyApi($id)
    {
        //
        $jugador= Jugador::findOrFail($id);

        if(Storage::delete('public/'.$jugador->Foto)){
            Jugador::destroy($id);
        }

        return redirect('jugador')->whit('mensaje','Empleado borrado correctamente');
    }
}

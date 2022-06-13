<?php

namespace App\Http\Controllers;

use App\Models\Fixture;
use Illuminate\Http\Request;

class FixtureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fechas= Fixture::paginate(10);
        return view('fixture.index', compact('fechasjugadores'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fixture  $fixture
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $torneo = Torneo::find($id);
        $fechas= Fixture::where('torneo',$torneo->id)->get();
        return view('fixture.show',compact('fechas','torneo'));   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fixture  $fixture
     * @return \Illuminate\Http\Response
     */
    public function edit(Fixture $fixture)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fixture  $fixture
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fixture $fixture)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fixture  $fixture
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fixture $fixture)
    {
        //
    }
}

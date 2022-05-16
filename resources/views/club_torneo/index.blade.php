
@extends('todos.app')
@section('content')
<h1>    Mostrar la lista de Torneos  </h1>
@if (Session::has('mensaje'))
    <div class="alert alert-success" role="alert">
        {{Session::get('mensaje')}}
    </div>
@endif
{{$torneos}}
<table class="table table-bordered border-primary ">
    <thead>
        <tr>
            
            <th>#</th>
            <th>Escudo</th>
            <th>Nombre</th>
            <th>Acciones</th>

        </tr>
    </thead>
    <tbody>

        @foreach ( $torneos as $torneos )
            
        
        <tr>
            <td>{{$torneos->anio}}</td>            
            <td>{{$torneos->Nombre}}</td>
            
            <td> 
                <a href="{{url('/clubTorneo/'.$torneos->id.'/edit')}}" class="btn btn-warning"> Editar </a>  
                <a href="{{url('/clubTorneo/show/'.$torneos->id)}}" class="btn btn-info"> Ver</a>
                <form action="{{url('/clubTorneo/'.$torneos->id)}}" class="d-inline" method="post">
                    @csrf
                    {{@method_field('DELETE')}}
                    <input class="btn btn-danger" type="submit" onclick="return confirm('¿Desea borrar?')" value="Borrar">
                </form>    
            
            </td>
        </tr>
        @endforeach
    </tbody> 
  </table>
{{-- {!! $torneos->links()!!} --}}
  @endsection
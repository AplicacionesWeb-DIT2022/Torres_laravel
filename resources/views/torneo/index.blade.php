
@extends('todos.app')
@section('content')
<h1>    Mostrar la lista de Torneos  </h1>
@if (Session::has('mensaje'))
<div class="alert alert-success" role="alert">
    {{Session::get('mensaje')}}
    </div>
    
@endif
<table class="table table-bordered border-primary ">
    <thead>
        <tr>
            <th>#</th>
            <th>Año</th>
            <th>Nombre</th>
        </tr>
    </thead>
    <tbody>
        @foreach ( $torneos as $torneo )
            
        
        <tr>
            <td> {{$torneo->id}}</td>
            {{-- <td>{{$jugador->Foto}}</td> --}}
            <td>{{$torneo->Anio}}</td>
            <td>{{$torneo->Nombre}}</td>
            <td> <a href="{{url('/torneo/edit/'.$torneo->id)}}" class="btn btn-warning"> Editar </a>  
                <a href="{{url('/torneoClub/show/'.$torneo->id)}}" class="btn btn-success"> Mostrar </a>  
                <form action="{{url('/torneo/'.$torneo->id)}}" class="d-inline" method="post">
                    @csrf
                    {{@method_field('DELETE')}}
                    <input class="btn btn-danger" type="submit" onclick="return confirm('¿Desea borrar?')" value="Borrar">
                </form>    
            
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
{!! $torneos->links()!!}
  @endsection
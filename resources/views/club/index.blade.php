
@extends('todos.app')
@section('content')
<h1>    Mostrar la lista de clubes  </h1>
@if (Session::has('mensaje'))
    <div class="alert alert-success" role="alert">
        {{Session::get('mensaje')}}
    </div>
    
@endif
<table class="table table-bordered border-primary ">
    <thead>
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>escudo</th>
        </tr>
    </thead>
    <tbody>
        
        @foreach ( $clubes as $club )
            
        
        <tr>
            <td> {{$club->id}}</td>
            {{-- <td>{{$club->escudo}}</td> --}}
            <td >
                <img src="{{asset('storage').'/'.$club->escudo}}" width="100" alt="Sin escudo">
            </td>
            
            <td>{{$club->Nombre}}</td>

            <td> <a href="{{url('/club/'.$club->id.'/edit')}}" class="btn btn-warning"> Editar </a>  
                <form action="{{url('/club/'.$club->id)}}" class="d-inline" method="post">
                    @csrf
                    {{@method_field('DELETE')}}
                    <input class="btn btn-danger" type="submit" onclick="return confirm('¿Desea borrar?')" value="Borrar">
                </form>    
            
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
{!! $clubes->links()!!}
  @endsection
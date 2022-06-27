
@extends('todos.app')
@section('content')
<div class="mt-4 p-5 bg-primary text-white rounded">

  <h1 class="text-center ">    LISTA DE JUGADORES  </h1>
  @if (Session::has('mensaje'))
  <div class="alert alert-success" role="alert">
    {{Session::get('mensaje')}}
  </div>
  
  @endif
</div>
<h5>Cantidad total de jugadores {{$cantidad}} </h5>
<br>
<div>

  <nav class="navbar justify-content-md-end bg-dark navbar-dark" >
    <form class="d-flex" type="get" action="{{url('/search')}}" >
      <input class="form-control me-2 float-end " name="query" placeholder="Dni" type="search"  aria-label="Search">
      <button class="btn btn-primary float-end" type="submit" style="margin-right: 100px">Buscar</button>
    </form>
  </nav>
  <br>
  <br>
</div>
  <div class="d-grid gap-2 d-md-flex justify-content-md-end">
    <a href="{{url('jugador/create')}}" class="btn btn-primary me-md-2" data-bs-toggle="tooltip" title="Agregar Jugador" type="button"  >
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-person" viewBox="0 0 16 16">
        <path d="M12 1a1 1 0 0 1 1 1v10.755S12 11 8 11s-5 1.755-5 1.755V2a1 1 0 0 1 1-1h8zM4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4z"/>
        <path d="M8 10a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
      </svg>
    </a>
    <a href="{{url('jugadores/pdf')}}" class="btn btn-primary me-md-2" data-bs-toggle="tooltip" title="Descargar PDF" type="button" >
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-filetype-pdf" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5L14 4.5ZM1.6 11.85H0v3.999h.791v-1.342h.803c.287 0 .531-.057.732-.173.203-.117.358-.275.463-.474a1.42 1.42 0 0 0 .161-.677c0-.25-.053-.476-.158-.677a1.176 1.176 0 0 0-.46-.477c-.2-.12-.443-.179-.732-.179Zm.545 1.333a.795.795 0 0 1-.085.38.574.574 0 0 1-.238.241.794.794 0 0 1-.375.082H.788V12.48h.66c.218 0 .389.06.512.181.123.122.185.296.185.522Zm1.217-1.333v3.999h1.46c.401 0 .734-.08.998-.237a1.45 1.45 0 0 0 .595-.689c.13-.3.196-.662.196-1.084 0-.42-.065-.778-.196-1.075a1.426 1.426 0 0 0-.589-.68c-.264-.156-.599-.234-1.005-.234H3.362Zm.791.645h.563c.248 0 .45.05.609.152a.89.89 0 0 1 .354.454c.079.201.118.452.118.753a2.3 2.3 0 0 1-.068.592 1.14 1.14 0 0 1-.196.422.8.8 0 0 1-.334.252 1.298 1.298 0 0 1-.483.082h-.563v-2.707Zm3.743 1.763v1.591h-.79V11.85h2.548v.653H7.896v1.117h1.606v.638H7.896Z"/>
      </svg>
    </a>
  </div>
  
  <div class="card-group container-fluid text-center"  >
    @foreach ( $jugadores as $jugador )
    <br>
    <div class="row ">    
      <div class="col" style="margin-left:25px">
      <img src= "{{asset('storage').'/'.$jugador->Foto}}" 
      style="border-style:double; border-color:rgb(220, 33, 0); border-radius: 5px;" 
      class="border border-5" width="250" height="150" alt="Sin foto">
      
      <div class="card-body" style="color:black >
        <h5 class="card-title">{{$jugador->Nombre}} </h5>     
        <p class="card-text">{{$jugador->Apellido}}</p>
        <p class="card-text">{{$jugador->club[0]->Nombre}}</p>

        <p class="card-text"><small class="text-muted">{{$jugador->Dni}}</small></p>
        <a href="{{url('/jugador/'.$jugador->id.'/edit')}}" class="btn btn-warning"> Editar </a>  
        <form action="{{url('/jugador/'.$jugador->id)}}" class="d-inline" method="post">
            @csrf
            {{@method_field('DELETE')}}
            <input class="btn btn-danger" type="submit" onclick="return confirm('¿Desea borrar?')" value="Borrar">
        </form>    
      </div>
      <br>
    </div> 
  </div>
  @endforeach

  </div>

{{-- <table class="table table-bordered border-primary ">
    <thead>
        <tr>
            <th>#</th>
            <th>Foto</th>
            <th>Dni</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Equipo</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ( $jugadores as $jugador )

        <tr>
            <td> {{$jugador->id}}</td>
            <td >
                <img src="{{asset('storage').'/'.$jugador->Foto}}" width="100" height="90" alt="Sin Foto">
            </td>
            <td>{{$jugador->Dni}}</td>
            <td>{{$jugador->Nombre}}</td>
            <td>{{$jugador->Apellido}}</td>
            <td>{{$jugador->club[0]->Nombre}}</td>

            <td> <a href="{{url('/jugador/'.$jugador->id.'/edit')}}" class="btn btn-warning"> Editar </a>  
                <form action="{{url('/jugador/'.$jugador->id)}}" class="d-inline" method="post">
                    @csrf
                    {{@method_field('DELETE')}}
                    <input class="btn btn-danger" type="submit" onclick="return confirm('¿Desea borrar?')" value="Borrar">
                </form>    
            
            </td>
        </tr>
        @endforeach
    </tbody>
  </table> --}}

{!! $jugadores->links()!!}
@endsection
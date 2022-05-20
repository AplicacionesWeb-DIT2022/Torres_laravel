@extends('todos.app')
@section('content')
 <div class="card bg-dark text-white text-center">
    <img src= "{{asset('storage').'/'.$club->Escudo}}" class="mx-auto d-block " width="100"  alt="Escudo">
      <h1 class="card-title">{{$club->Nombre}}</h1>
      <p class="card-text">{{$club->Descripcion}}</p>
      <p class="card-text">Una descripcion mas descriptiva</p>
      <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a href="{{url('/club/').'/'.$club->id.'/edit'}}" class="btn btn-primary me-md-2" type="button" >Editar</a>
      </div>    
    </div>
<br>
  <div">
    <a href="{{url('jugador/create')}}" class="btn btn-primary me-md-2" type="button" >Nuevo Jugador</a>
    <br>
  </div>
  <div class="card-group container-fluid text-center " >
    @foreach ( $jugadores as $jugador )
    <br>
    <div class="row">    
      <div class="col">
      <img src= "{{asset('storage').'/'.$jugador->Foto}}" class="rounded-3" width="350" height="250" alt="Sin foto">
      <div class="card-body" style="width:18rem;">
        <h5 class="card-title">{{$jugador->Nombre}} </h5>     
        <p class="card-text">{{$jugador->Apellido}}</p>
        <p class="card-text"><small class="text-muted">{{$jugador->Dni}}</small></p>
        <a href="{{url('/jugador/'.$jugador->id.'/edit')}}" class="btn btn-warning"> Editar </a>  
        <form action="{{url('/jugador/'.$jugador->id)}}" class="d-inline" method="post">
            @csrf
            {{@method_field('DELETE')}}
            <input class="btn btn-danger" type="submit" onclick="return confirm('¿Desea borrar?')" value="Borrar">
        </form>    
      </div>
    </div> 
  </div>
  @endforeach
  </div>

@endsection
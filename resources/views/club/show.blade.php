@extends('todos.app')
@section('content')

{{-- <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      @foreach ($jugadores as $jugador)
        
      <div class="carousel-item active">
        <img src= "{{asset('storage').'/'.$jugador->Foto}}" class="d-block w-100" alt="Sin foto" width="100">        
      </div>
      @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div> --}}

  <div class="card bg-dark text-white">
    <img src= "{{asset('storage').'/'.$club->Foto}}"  alt="Sin foto">
    <div class="card-body">
      <h1 class="card-title">{{$club->Nombre}}</h1>
      <p class="card-text">Una descrpcion</p>
      <p class="card-text">una descripcion mas descriptiva</p>
    </div>
  </div>

  <div class="card-group">
    @foreach ( $jugadores as $jugador )
    <br>
    <div class="card">    
      <div class="col">
      <img src= "{{asset('storage').'/'.$jugador->Foto}}" class="card-img-top" alt="Sin foto">
      <div class="card-body" style="width:18rem;">
        <h5 class="card-title">{{$jugador->Nombre}} </h5>     
        <p class="card-text">{{$jugador->Apellido}}</p>
        <p class="card-text"><small class="text-muted">{{$jugador->Dni}}</small></p>
      </div>
    </div> 
  </div>
  @endforeach
  </div>

@endsection
@extends('todos.app')
@section('content')
<div class="mt-4 p-5 bg-primary text-white rounded">
    
    <h1 class="text-center">Torneo: {{$torneo->Nombre}}</h1>  
</div>
<h1>Equipos participantes</h1>
<br>
<div class="card-group container-fluid text-center " >
  @foreach ($equipos as $equipos )
  <br>
  <div class="row">    
    <div class="col">
    <img src= "{{asset('storage').'/'.$equipos->Escudo}}" class="rounded-3" width="100" height="100" alt="Sin foto">
    <div class="card-body" style="width:18rem;">
      <h5 class="card-title">{{$equipos->Nombre}} </h5>     
      <a href="{{url('/club/'.$equipos->id.'/edit')}}" class="btn btn-warning"> Editar </a>  
      <form action="{{url('/club/'.$equipos->id)}}" class="d-inline" method="post">
          @csrf
          {{@method_field('DELETE')}}
          <input class="btn btn-danger" type="submit" onclick="return confirm('¿Desea borrar?')" value="Borrar">
      </form>    
    </div>
  </div> 
</div>
@endforeach
</div>

{{-- 
<p>{{$equipos->Nombre}} Equipos</p>     
<p>{{$equipos->Escudo}} id </p> --}}

@endsection
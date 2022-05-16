@extends('todos.app')
@section('content')
{{$torneo}}
<div class="mt-4 p-5 bg-primary text-white rounded">
    
    <h1>Torneo</h1>
    <p>{{$torneo->Nombre}}</p>
    <p>{{$torneo->anio}}</p>
  </div>
@endsection
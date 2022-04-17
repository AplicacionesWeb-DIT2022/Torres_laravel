@extends('todos.app')
@section('content')

<br>
<form action="{{url ('/jugador')}}" method="POST" enctype="multipart/form-data">

@include('jugador.form',['modo'=>'Crear']);
@csrf
</form>
@endsection
@extends('todos.app')
@section('content')

<br>
<form action="{{url ('/torneo')}}" method="POST" enctype="multipart/form-data">

@include('torneo.form',['modo'=>'Crear']);
@csrf
</form>
@endsection
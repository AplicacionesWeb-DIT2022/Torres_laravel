@extends('todos.app')
@section('content')

<br>
<form action="{{url ('/club')}}" method="POST" enctype="multipart/form-data">

@include('club.form',['modo'=>'Crear']);
@csrf
</form>
@endsection
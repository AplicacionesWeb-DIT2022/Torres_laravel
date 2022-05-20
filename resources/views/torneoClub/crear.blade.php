@extends('todos.app')
@section('content')

<br>
<form action="{{url ('/torneoClub')}}" method="POST" enctype="multipart/form-data">

@include('torneoClub.form',['modo'=>'Crear'])
@csrf
</form>
@endsection
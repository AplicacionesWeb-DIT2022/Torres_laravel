@extends('todos.app')
@section('content')

<br>
<form action="{{url ('/clubTorneo')}}" method="POST" enctype="multipart/form-data">

@include('club_torneo.form',['modo'=>'Crear'])
@csrf
</form>
@endsection
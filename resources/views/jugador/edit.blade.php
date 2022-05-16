@extends('todos.app')
@section('content')
<div id="app">
    <form action="{{url('/jugador/'.$jugador->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        {{method_field('PATCH') }}
        @include('jugador.form', ['modo'=> 'Editar'])
    </form>
</div>
@endsection
formulario para editar jugadores
@extends('app')
@section('content')
<div class="card" style="width: 18rem;">
    <form action="{{url('/jugador/'.$jugador->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        {{method_field('PATCH') }}
        @include('jugador.form');
    </form>
</div>
@endsection
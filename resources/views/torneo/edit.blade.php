@extends('todos.app')
@section('content')
<div >
    <form action="{{url('/torneo/'.$torneo->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        {{method_field('PATCH') }}
        @include('torneo.form', ['modo'=> 'Editar'])
    </form>
</div>
@endsection
@extends('todos.app')
@section('content')
<div>
    <form action="{{url('/club/'.$club->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        {{method_field('PATCH') }}
        @include('club.form', ['modo'=> 'Editar']);
    </form>
</div>
@endsection
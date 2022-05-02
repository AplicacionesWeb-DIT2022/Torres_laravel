@extends('todos.app')
@section('content')
<div class="card" style="width: 18rem;">
    <form action="{{url('/club/'.$club->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        {{method_field('PATCH') }}
        @include('club.form', ['modo'=> 'editar']);
    </form>
</div>
@endsection
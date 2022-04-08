@extends('app')

@section('content')
<div class="container w-25 border p-4 mt-4">
    <form action="{{route('todos')}}" method="POST"> 
    @csrf
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
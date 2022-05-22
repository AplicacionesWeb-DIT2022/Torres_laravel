
@extends('todos.app')
@section('content')

<h1 class="text-center">LISTA DE EQUIPOS  </h1>

@if (Session::has('mensaje'))
    <div class="alert alert-success" role="alert">
        {{Session::get('mensaje')}}
    </div>
    
@endif
<div>  
    <nav class="navbar d-grid gap-2 d-md-flex justify-content-md-end" >
        <form class="d-flex" type="get" action="{{url('/search')}}" >
            <input class="form-control me-2 float-end " name="query" placeholder="Nombre de club" type="search">
            <button class="btn btn-primary float-end" type="submit" style="margin-right: 100px">Buscar</button>
        </form>
    </nav>
</div>
 <br>

<div class="d-grid gap-2 d-md-flex justify-content-md-end">
    <a href="{{url('club/create')}}" class="btn btn-primary me-md-2" data-bs-toggle="tooltip" title="Agregar Club" type="button"  >
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-shield-fill-plus" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M8 0c-.69 0-1.843.265-2.928.56-1.11.3-2.229.655-2.887.87a1.54 1.54 0 0 0-1.044 1.262c-.596 4.477.787 7.795 2.465 9.99a11.777 11.777 0 0 0 2.517 2.453c.386.273.744.482 1.048.625.28.132.581.24.829.24s.548-.108.829-.24a7.159 7.159 0 0 0 1.048-.625 11.775 11.775 0 0 0 2.517-2.453c1.678-2.195 3.061-5.513 2.465-9.99a1.541 1.541 0 0 0-1.044-1.263 62.467 62.467 0 0 0-2.887-.87C9.843.266 8.69 0 8 0zm-.5 5a.5.5 0 0 1 1 0v1.5H10a.5.5 0 0 1 0 1H8.5V9a.5.5 0 0 1-1 0V7.5H6a.5.5 0 0 1 0-1h1.5V5z"/>
        </svg>
    </a>
    <a href="{{url('club/pdf')}}" class="btn btn-primary me-md-2" data-bs-toggle="tooltip" title="Descargar PDF" type="button" >
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-filetype-pdf" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5L14 4.5ZM1.6 11.85H0v3.999h.791v-1.342h.803c.287 0 .531-.057.732-.173.203-.117.358-.275.463-.474a1.42 1.42 0 0 0 .161-.677c0-.25-.053-.476-.158-.677a1.176 1.176 0 0 0-.46-.477c-.2-.12-.443-.179-.732-.179Zm.545 1.333a.795.795 0 0 1-.085.38.574.574 0 0 1-.238.241.794.794 0 0 1-.375.082H.788V12.48h.66c.218 0 .389.06.512.181.123.122.185.296.185.522Zm1.217-1.333v3.999h1.46c.401 0 .734-.08.998-.237a1.45 1.45 0 0 0 .595-.689c.13-.3.196-.662.196-1.084 0-.42-.065-.778-.196-1.075a1.426 1.426 0 0 0-.589-.68c-.264-.156-.599-.234-1.005-.234H3.362Zm.791.645h.563c.248 0 .45.05.609.152a.89.89 0 0 1 .354.454c.079.201.118.452.118.753a2.3 2.3 0 0 1-.068.592 1.14 1.14 0 0 1-.196.422.8.8 0 0 1-.334.252 1.298 1.298 0 0 1-.483.082h-.563v-2.707Zm3.743 1.763v1.591h-.79V11.85h2.548v.653H7.896v1.117h1.606v.638H7.896Z"/>
        </svg>
    </a>
</div>
<br>

<table class="table table-bordered border-primary ">
    <thead>
        <tr>
            <th>#</th>
            <th>Escudo</th>
            <th>Nombre</th>
            <th>Acciones</th>

        </tr>
    </thead>
    <tbody>
        
        @foreach ( $clubes as $club )
            
        
        <tr>
            <td> {{$club->id}}</td>
            {{-- <td>{{$club->escudo}}</td> --}}
            <td >
                <img src="{{asset('storage').'/'.$club->Escudo}}" width="100" alt="Sin escudo">
            </td>
            
            <td>{{$club->Nombre}}</td>
            
            <td> 
                <a href="{{url('/club/'.$club->id.'/edit')}}" class="btn btn-warning"> Editar </a>  
                <a href="{{url('/club/show/'.$club->id)}}" class="btn btn-info"> Ver</a>
                <form action="{{url('/club/'.$club->id)}}" class="d-inline" method="post">
                    @csrf
                    {{@method_field('DELETE')}}
                    <input class="btn btn-danger" type="submit" onclick="return confirm('¿Desea borrar?')" value="Borrar">
                </form>    
            
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
{!! $clubes->links()!!}
  @endsection
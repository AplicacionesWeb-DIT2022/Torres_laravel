mostrar la lista de jugadores  
@extends('app')
@section('content')
<table class="table table-bordered border-primary">
    <thead>
        <tr>
            <th>#</th>
            <th>Foto</th>
            <th>Dni</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Equipo</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ( $jugadores as $jugador )
            
        
        <tr>
            <td> {{$jugador->id}}</td>
            {{-- <td>{{$jugador->Foto}}</td> --}}
            <td >
                <img src="{{asset('storage').'/'.$jugador->Foto}}" width="100" alt="Sin Foto">
            </td>
            <td>{{$jugador->Dni}}</td>
            <td>{{$jugador->Nombre}}</td>
            <td>{{$jugador->Apellido}}</td>
            <td>{{$jugador->Equipo}}</td>

            <td> <a href="{{url('/jugador/'.$jugador->id.'/edit')}}" > Editar </a>  
                <form action="{{url('/jugador/'.$jugador->id)}}" method="post">
                    @csrf
                    {{@method_field('DELETE')}}
                    <input type="submit" onclick="return confirm('¿Desea borrar?')" value="Borrar">
                </form>    
            
            </td>
        </tr>
        @endforeach)
    </tbody>
  </table>
  @endsection
formulario para editar jugadores

<form action="{{url('/jugador/'.$jugador->id)}}" method="post" enctype="multipart/form-data"></form>
@csrf
{{method_field('PATCH') }}
@include('jugador.form');

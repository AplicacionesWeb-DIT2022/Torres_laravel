<h1> {{$modo}} Jugador</h1>
@if (count($errors)>0)
    <div class="alert alert-danger" role="alert">
        <ul>
        @foreach ($errors->all() as $error )
            <li>{{$error}} </li>
        
    @endforeach
</ul>
</div>
@endif
<div class="container">
<div class="mb-3">
    <label for="Nombre" class="form-label" >Nombre</label>
    <input type="text" class="form-control" name="Nombre" value="{{isset($jugador->Nombre)?$jugador->Nombre:old('Nombre') }}" id="Nombre" placeholder="Nombre" >
</div>
<div class="mb-3">
    <label for="Dni" class="form-label">DNI</label>
    <input type="text" class="form-control" id="Dni" placeholder="Dni" value="{{isset($jugador->Dni)?$jugador->Dni:old('Dni') }}" name="Dni">
</div>
<div class="mb-3">
    <label for="apellido" class="form-label">Apellido</label>
    <input type="text" class="form-control" id="Apellido" placeholder="Apellido" value="{{isset($jugador->Apellido)?$jugador->Apellido:old('Apellido') }}" name="Apellido">
</div>
<div class="mb-3">
    <label for="equipo" class="form-label">Nombre del equipo</label>
    <input type="text" class="form-control" id="Equipo" placeholder="Equipo" value="{{isset($jugador->Equipo)?$jugador->Equipo:old('Equipo') }}" name="Equipo">
</div>
<div class="mb-3">
    <label for="foto" class="form-label">Foto del jugador</label>
    @if (isset($jugador->Foto))
        <img src="{{asset('storage').'/'.$jugador->Foto}}"  width="100" alt=" Sin foto">
    @endif
    <input class="form-control form-control-lg"  id="Foto" value="" type="file" name="Foto">
</div>
 
<div class="mb-3">
    <input class="form-control form-control-lg"  type="submit" value="{{$modo}} datos">
</div>
</div>
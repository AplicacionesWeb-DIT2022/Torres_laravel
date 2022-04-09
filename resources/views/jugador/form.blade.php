
<div class="mb-3">
    <label for="Nombre" class="form-label" >Nombre</label>
    <input type="text" class="form-control" name="Nombre" value="{{isset($jugador->Nombre)?$jugador->Nombre:'' }}" id="Nombre" placeholder="Nombre" >
</div>
<div class="mb-3">
    <label for="Dni" class="form-label">DNI</label>
    <input type="text" class="form-control" id="Dni" placeholder="Dni" value="{{isset($jugador->Dni)?$jugador->Dni:'' }}" name="Dni">
</div>
<div class="mb-3">
    <label for="apellido" class="form-label">Apellido</label>
    <input type="text" class="form-control" id="Apellido" placeholder="Apellido" value="{{isset($jugador->Apellido)?$jugador->Apellido:'' }}" name="Apellido">
</div>
<div class="mb-3">
    <label for="equipo" class="form-label">Nombre del equipo</label>
    <input type="text" class="form-control" id="Equipo" placeholder="Equipo" value="{{isset($jugador->Equipo)?$jugador->Equipo:'' }}" name="Equipo">
</div>
<div class="mb-3">
    <label for="foto" class="form-label">Foto del jugador</label>
    @if (isset($jugador->Foto))
        
    <img src="{{asset('storage').'/'.$jugador->Foto}}"  width="100" alt=" Sin foto">
    @endif
    <input class="form-control form-control-lg"  id="Foto" type="file" name="Foto">
</div>

<div class="mb-3">
    <input class="form-control form-control-lg"  type="submit" value="Guardar datos">
</div>

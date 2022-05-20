@if (count($errors)>0)
    <div class="alert alert-danger" role="alert">
        <ul>
        @foreach ($errors->all() as $error )
            <li>{{$error}} </li>
        
    @endforeach
</ul>
</div>
@endif

<div class="container p-5 my-5 border" >
    <h1 class="text-center">Registro un torneo</h1>
    <h2>Paso 1: Crear Torneo</h2>
    <div class="form-group">
        <label for="Nombre">Nombre</label>
        <input type="text" class="form-control" id="Nombre" name="Nombre" placeholder="Nombre">
    </div>
    <div class="form-group">
        <label for="Anio">Año</label>
        <input type="text" class="form-control" id="Anio" name="Anio" placeholder="Año">
    </div>
    <div class="form-group">
        <label for="Descripcion">Descripcion</label>
        <input type="text" class="form-control" id="Descripcion" name="Descripcion" placeholder="Descripcion">
    </div>
    
    <br>
        <h2> Paso 2: Agregar equipos</h2>
        @foreach ($club as $clubes )
        <div class="form-switch form-check">
            <input class="form-check" type="checkbox" id="id" name="Equipos[]" value="{{$clubes->id}}"> 
            <label class="form-check-label"> {{$clubes->Nombre}} </label>
        </div> 
        @endforeach
        <input class="form-control form-control-lg"  type="submit" value="{{$modo}} datos">
        <br>
        
    </div>
</div>
    
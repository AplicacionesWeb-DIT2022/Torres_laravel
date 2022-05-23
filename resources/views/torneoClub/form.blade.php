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
        <div class="card-group text-center">
            @foreach ($club as $clubes )
            <div class="row">
                <div class="col" style="margin-left:25px">
                    <div class="card-body form-switch form-check">
                        <label class="btn btn-primary ">{{$clubes->Nombre}} 
                            <input class="card-text form-check " type="checkbox" id="id" name="Equipos[]" checked value="{{$clubes->id}}"> 
                        </label>
                    </div>
                </div>    
            </div>
            @endforeach
        </div>
        
        <input class="form-control form-control-lg"  type="submit" value="{{$modo}} datos">
        <br>
        
    </div>
</div>
    
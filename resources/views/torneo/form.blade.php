<h1 class="text-center"> {{$modo}} Torneo</h1>
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
        <label for="anio" class="form-label">Año</label>
        <input type="text" class="form-control" id="anio" placeholder="anio" value="{{isset($torneo->anio)?$torneo->anio:old('anio') }}" name="anio">
    </div>
<div class="mb-3">
    <label for="Nombre" class="form-label" >Nombre</label>
    <input type="text" class="form-control" name="Nombre" value="{{isset($torneo->Nombre)?$torneo->Nombre:old('Nombre') }}" id="Nombre" placeholder="Nombre" >
</div>

 
<div class="mb-3">
    <input class="form-control form-control-lg"  type="submit" value="{{$modo}} datos">
</div>
</div>
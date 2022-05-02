<h1> {{$modo}} club</h1>
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
    <input type="text" class="form-control" name="Nombre" value="{{isset($club->Nombre)?$club->Nombre:old('Nombre') }}" id="Nombre" placeholder="Nombre" >
</div>
<div class="mb-3">
    <label for="escudo" class="form-label">Escudo del club</label>
    @if (isset($club->Escudo))
        <img src="{{asset('storage').'/'.$club->Escudo}}"  width="100" alt=" Sin escudo">
    @endif
    <input class="form-control form-control-lg"  id="Escudo" value="" type="file" name="Escudo">
</div>
 
<div class="mb-3">
    <input class="form-control form-control-lg"  type="submit" value="{{$modo}} datos">
</div>
</div>
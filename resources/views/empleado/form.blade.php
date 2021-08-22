<h1>{{ $modo }} Empleado</h1>

@if(count($errors)>0)
<div class="alert alert-danger" role="alert">
    <ul>
        @foreach($errors->all() as $error )
        <li> {{$error}}</li>
        @endforeach
    </ul>
</div>
@endif

<br>
<label for="Nombre">Nombre</label>
<input class="form-control" type="text" name="Nombre" value="{{ isset($empleado->Nombre)?$empleado->Nombre:old('Nombre') }}" > <br>
<label for="Apellido">Apellido</label>
<input class="form-control" type="text" name="Apellido" value="{{ isset($empleado->Apellido)?$empleado->Apellido:old('Apellido') }}" > <br>
<label for="Correo">Correo</label>
<input class="form-control" type="email" name="Correo" value="{{ isset($empleado->Correo)?$empleado->Correo:old('Correo') }}" > <br>
<label for="Rol">Rol</label>
<input class="form-control" type="text" name="Rol" value="{{ isset($empleado->Rol)?$empleado->Rol:old('Rol') }}" > <br>
<Label for="Foto"> Foto</Label>
@if(isset($empleado->Foto))
<img src="{{asset('storage'.'/'.$empleado->Foto)}}" width="100" alt="">
@endif
<input class="form-control" type="file" name="Foto" value=""> <br>

<input class="btn btn-success" type="submit" value="{{ $modo }} datos"> <br><br><br>

<a class="btn btn-info" href="{{url('empleado')}}">Regresar</a>
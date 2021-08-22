<h1>{{ $modo }} Empleado</h1>
<br>
<label for="Nombre">Nombre</label>
<input class="form-control" type="text" name="Nombre" value="{{ isset($empleado->Nombre)?$empleado->Nombre:'' }}"> <br> <br>
<label for="Apellido">Apellido</label>
<input class="form-control" type="text" name="Apellido" value="{{ isset($empleado->Apellido)?$empleado->Apellido:'' }}"> <br> <br>
<label for="Correo">Correo</label>
<input class="form-control" type="email" name="Correo" value="{{ isset($empleado->Correo)?$empleado->Correo:'' }}"> <br> <br>
<label for="Rol">Rol</label>
<input class="form-control" type="text" name="Rol" value="{{ isset($empleado->Rol)?$empleado->Rol:'' }}"> <br> <br>
<Label for="Foto"> Foto</Label>
@if(isset($empleado->Foto))
<img src="{{asset('storage'.'/'.$empleado->Foto)}}" width="100" alt="">
@endif
<input class="form-control" type="file" name="Foto" value=""> <br> <br>
<label for="Enviar"> Enviar</label>
<input class="form-control" type="submit" value="{{ $modo }} datos"> <br> <br>
<a href="{{url('empleado')}}">Regresar</a>

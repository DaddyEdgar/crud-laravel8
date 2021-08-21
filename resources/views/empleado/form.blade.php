<label for="Nombre">Nombre</label>
<input class="form-control" type="text" name="Nombre" value="{{ $empleado->Nombre}}"> <br> <br>
<label for="Apellido">Apellido</label>
<input class="form-control" type="text" name="Apellido" value="{{ $empleado->Apellido}}"> <br> <br>
<label for="Correo">Correo</label>
<input class="form-control" type="email" name="Correo" value="{{ $empleado->Correo }}"> <br> <br>
<label for="Rol">Rol</label>
<input class="form-control" type="text" name="Rol" value="{{ $empleado->Rol}}"> <br> <br>
<Label for="Foto"> Foto</Label>
{{ $empleado->Foto}}
<input class="form-control" type="file" name="Foto" value=""> <br> <br>
<label for="Enviar"> Enviar</label>
<input class="form-control" type="submit" value="Guardar datos"> <br> <br>
Todos los datos de la bd
<br>
@if(Session::has('mensaje'))
{{Session::get('mensaje')}}
@endif

<br>
<a href="{{url('empleado/create')}}">Agregar</a>

<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Foto</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col">Correo</th>
            <th scope="col">Rol</th>
            <th scope="col">Accioes</th>
        </tr>
    </thead>
    <tbody>
        @foreach($empleados as $empleado)
        <tr>
            <td>{{ $empleado->id }}</td>
            <td>
                <img src="{{asset('storage'.'/'.$empleado->Foto)}}" width="100" alt="">       
            </td>
            <td>{{ $empleado->Nombre}}</td>
            <td>{{ $empleado->Apellido}}</td>
            <td>{{ $empleado->Correo}}</td>
            <td>{{ $empleado->Rol}}</td>
            <td>
                <a href="{{ url('/empleado/'.$empleado->id.'/edit')}}">Editar</a>
                |

                <form action="{{ url('/empleado/'.$empleado->id)}}" method="post">
                    @csrf
                    {{method_field('DELETE')}}
                    <input type="submit" onclick="return confirm('¿Quieres eliminarlo?')" value="Borrar">
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
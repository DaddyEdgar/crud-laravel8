@extends('layouts.app')

@section('content')
<div class="container">
    @if(Session::has('mensaje'))
    <div class="alert alert-success alert-dismissible" role="alert">
        {{Session::get('mensaje')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <br>
    <a class="btn btn-primary" href="{{url('empleado/create')}}">Agregar</a>
    <br><br>
    <div class="table-responsive">
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
                        <a class="btn btn-warning" href="{{ url('/empleado/'.$empleado->id.'/edit')}}">Editar</a>
                        |

                        <form action="{{ url('/empleado/'.$empleado->id)}}" class="d-inline" method="post">
                            @csrf
                            {{method_field('DELETE')}}
                            <input class="btn btn-danger" type="submit" onclick="return confirm('¿Quieres eliminarlo?')" value="Borrar">
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {!! $empleados->links() !!}
    </div>
</div>
@endsection
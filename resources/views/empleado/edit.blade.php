@extends('layouts.app')
@section('content')
<div class="container">
    <form action="{{ url('/empleado/'.$empleado->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        {{method_field('PATCH')}}
        <!-- Incluye la información y asigna el modo-->
        @include('empleado.form',['modo'=>'Editar'])
    </form>
</div>
@endsection
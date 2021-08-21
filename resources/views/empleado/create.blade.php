<form action="{{ url('/empleado') }}" method="post" enctype="multipart/form-data">
    <!--IMPRIMIR LLAVE DE SEGURIDAD REQUIRIDO POR LARAVEL-->
    @csrf
    @include('empleado.form');
</form>
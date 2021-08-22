<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['empleados'] = Empleado::paginate(1);
        return view('empleado.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('empleado.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        //Validar campos
        $campos = [
            'Nombre' => 'required|string|max:100',
            'Apellido' => 'required|string|max:100',
            'Correo' => 'required|email',
            'Rol' => 'required|string|max:100',
            'Foto' => 'required|max:10000|mimes:jpeg,png,jpg',
        ];
        //enviar mensaje
        $mensaje = [
            'required' => 'El :attribute es requierido',
            'Foto.required' => 'La foto es requerido',
        ];
        //Juntar la validacion y mensaje
        $this->validate($request, $campos, $mensaje);

        //Obtienes todos los datos del formulario
        //$datosEmpleado = request()->all();

        //Obtienes todos los datos excepto el token
        $datosEmpleado = request()->except('_token');

        //Validar la foto
        if ($request->hasFile('Foto')) {
            $datosEmpleado['Foto'] = $request->file('Foto')->store('uploads', 'public');
        }

        //Con el modelo insertas con los campos que están enviando con la variable $datosEmpleado 
        Empleado::insert($datosEmpleado);


        //return response()->json($datosEmpleado);
        return redirect('empleado')->with('mensaje', 'Empleado agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        //Buscamos el id para editarlo
        $empleado = Empleado::findOrFail($id);
        //Retornamos la vista con el id y su informacion del id
        return view('empleado.edit', compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Validar campos
        $campos = [
            'Nombre' => 'required|string|max:100',
            'Apellido' => 'required|string|max:100',
            'Correo' => 'required|email',
            'Rol' => 'required|string|max:100',
        ];
        //enviar mensaje
        $mensaje = [
            'required' => 'El :attribute es requierido',
        ];
        if ($request->hasFile('Foto')) {
            $campos = ['Foto' => 'required|max:10000|mimes:jpeg,png,jpg',];
            $mensaje = ['Foto.required' => 'La foto es requerido',];
        }
        //Juntar la validacion y mensaje
        $this->validate($request, $campos, $mensaje);

        //
        //Obtienes todos los datos excepto el token
        $datosEmpleado = request()->except(['_token', '_method']);
        //Validar la foto
        if ($request->hasFile('Foto')) {
            $empleado = Empleado::findOrFail($id);
            Storage::delete('public/' . $empleado->Foto);
            $datosEmpleado['Foto'] = $request->file('Foto')->store('uploads', 'public');
        }


        Empleado::where('id', '=', $id)->update($datosEmpleado);
        //Buscamos el id para editarlo
        $empleado = Empleado::findOrFail($id);
        //Retornamos la vista con el id y su informacion del id
        //return view('empleado.edit', compact('empleado'));
        return redirect('empleado')->with('mensaje', 'Empleado Modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        //Buscamos el id para eliminarlo
        $empleado = Empleado::findOrFail($id);
        if (Storage::delete('public/' . $empleado->Foto)) {
            Empleado::destroy($id);
        }


        return redirect('empleado')->with('mensaje', 'Empleado eliminado');
    }
}

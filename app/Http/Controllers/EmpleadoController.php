<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;

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
        $datos['empleados'] = Empleado::paginate(5);
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


        return response()->json($datosEmpleado);
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
        //
        //Obtienes todos los datos excepto el token
        $datosEmpleado = request()->except(['_token', '_method']);
        Empleado::where('id', '=', $id)->update($datosEmpleado);
        //Buscamos el id para editarlo
        $empleado = Empleado::findOrFail($id);
        //Retornamos la vista con el id y su informacion del id
        return view('empleado.edit', compact('empleado'));
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
        Empleado::destroy($id);
        return redirect('empleado');
    }
}

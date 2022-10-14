<?php

namespace App\Http\Controllers;

use App\Models\Empleados;
use Illuminate\Http\Request;
use Throwable;

class EmpleadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $empleados = Empleados::getEmpleados();

            return response()->json($empleados);
        } catch (Throwable $e) {
            return response()->json([
                'mensaje'=>'Message: ' . $e->getMessage()
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $empleados = Empleados::create($request->post());

            return response()->json($empleados);
        } catch (Throwable $e) {
            return response()->json([
                'mensaje'=>'Message: ' . $e->getMessage()
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleados $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(Empleados $empleado)
    {
        try {
            return response()->json($empleado);
        } catch (Throwable $e) {
            return response()->json([
                'mensaje'=>'Message: ' . $e->getMessage()
            ]);
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Empleados $empleados)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleados $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empleados $empleado)
    {
        try {
            $empleado->fill($request->post())->save();
            return response()->json([
                'empleado' => $empleado
            ]);
        } catch (Throwable $e) {
            return response()->json([
                'mensaje' => 'Message: ' . $e->getMessage()
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleados $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empleados $empleado)
    {
        try {
            Empleados::eliminarEmpleado($empleado['id']);
            return response()->json([
                'mensaje'=>'¡Registro eliminado correctamente!'
            ]);
        } catch (Throwable $e) {
            return response()->json([
                'mensaje'=>'Message: ' . $e->getMessage()
            ]);
        }

    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Actualizacion_fecha;
use App\Models\programacion_semanal;
use Illuminate\Http\Request;

class ActualizacionFechaController extends Controller
{

    public function create(Request $request)
    {

        $actualizarFecha = Actualizacion_fecha::create([
            'idProgramacionSemanal' => $request->input('idProgramacionSemanal'),
            'fechaAnterior' => null,
            'fechaActualizada' => $request->input('fechaActualizada'),
            'idRazon' => $request->input('idRazon')
        ]);

        $actualizacionFecha = programacion_semanal::findOrFail($actualizarFecha->idProgramacionSemanal);

        $actualizarFecha->update([
            'fechaAnterior' => $actualizacionFecha->fechaInspeccion,
        ]);

        $actualizacionFecha->update([
            'fechaInspeccion' => $actualizarFecha->fechaActualizada,
        ]);

        

        

        return response()->json(["mensaje" => "Creación satisfactoria", "datos" => $actualizarFecha], 201, []);

    }
}

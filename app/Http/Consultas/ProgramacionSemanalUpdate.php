<?php

namespace App\Http\Consultas;

use App\Models\programacion_semanal;

class ProgramacionSemanalUpdate 
{

    protected $ProgramacionSemanalConsulta;

    public function __construct(ProgramacionSemanalConsulta $ProgramacionSemanalConsulta)
    {
        return $this->ProgramacionSemanalConsulta = $ProgramacionSemanalConsulta;
    }

    public function updateAplazoFecha($request, $id)
    {
        $programacion = programacion_semanal::findOrFail($id);
        
        $programacion->update([
            "aplazo_fecha" => $request->input('aplazo_fecha')
        ]);

        return $programacion;
    }

    public function updateRealizado(int $id)
    {
        $programacion = programacion_semanal::findOrFail($id);

        if ($programacion->realizado == 1) {
            $programacion->update([
                "realizado" => 0,
                "updated_at" => date('Y-m-d H:i')
            ]);

        } else {
            $programacion->update([
                "realizado" => 1,
                "updated_at" => date('Y-m-d H:i')
            ]);
        }

        return $programacion;
    }

    public function asignacionDatos($idPrSe){

        $ultimoElementoStract = $this->ProgramacionSemanalConsulta->getUltimoElemento();
        $dataUltimaCreacion = json_decode($ultimoElementoStract, true)[0];

        $dataUpdate = programacion_semanal::findOrFail($idPrSe);
        $dataUpdate->update([
            'fechaInspeccion' => $dataUltimaCreacion['fecha'],
            'local' => $dataUltimaCreacion['local'],
            'direccion' => $dataUltimaCreacion['direccion'],
            'ingeniero_1' => $dataUltimaCreacion['inspector_1'],
            'ingeniero_2' => $dataUltimaCreacion['inspector_2'],
            'realizado' => 0,
            'aplazo_fecha' => $dataUltimaCreacion['aplazoFecha'],
        ]); 
    }
}
<?php

namespace App\Http\Consultas;

use App\Models\Expediente;

class ExpedienteUpdate
{
    public function updateExpediente($request, int $id){
        $updateExpediente = Expediente::findOrFail($id);

        $updateExpediente->update([
            'ruc' => $request->input('ruc'),
            'fechaIngresoMesaPartes' => $request->input('fechaIngresoMesaPartes'),
            'fechaIngresoSGDC' => $request->input('fechaIngresoSGDC'),
            'fechaRecepcionInspeccion' => $request->input('fechaRecepcionInspeccion'),
            'recepcionLicenciaFuncionamiento' =>$request->input('recepcionLicenciaFuncionamiento'),
            'fechaLimiteInspeccion' => $request->input('fechaLimiteInspeccion'),
            'numeroInforme' => $request->input('numeroInforme'),
            'estado' => $request->input('estado'),
            'fecha' => $request->input('fecha'),
            'hora' => $request->input('hora'),
            'ILO' => $request->input('ILO'),
        ]);
    }
}
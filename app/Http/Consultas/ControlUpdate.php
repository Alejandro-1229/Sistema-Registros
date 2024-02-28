<?php 

namespace App\Http\Consultas;

use App\Models\control;

class ControlUpdate
{
    public function updateControl($request, $id){
        $control = control::findOrFail($id);

        $control->update([
            'numeroExpediente' => $request->input('numeroExpediente'),
            'idTipoItse' => $request->input('idTipoItse'),
            'idFuncion' => $request->input('idFuncion'),
            'idNivelRiesgo' => $request->input('idNivelRiesgo'),
            'razonSocial' => $request->input('razonSocial'),
            'nombreEstablecimiento' => $request->input('nombreEstablecimiento'),
            'giroDelNegocio' => $request->input('giroDelNegocio'),
            'datosSolicitante' => $request->input('datosSolicitante'),
            'fechaIngreso' => $request->input('fechaIngreso'),
            'fechaIngresoSGDC' => $request->input('fechaIngresoSGDC'),
            'barrio' => $request->input('barrio'),
            'nombreHabilitacionUrbana' => $request->input('nombreHabilitacionUrbana'),
            'areaOcupada' => $request->input('areaOcupada'),
            'numeroPisos' => $request->input('numeroPisos'),
            'manzana' => $request->input('manzana'),
            'lote' => $request->input('lote'),
            'tipoVia' => $request->input('tipoVia'),
            'nombreVia' => $request->input('nombreVia'),
            'numeroMunicipal' => $request->input('numeroMunicipal'),
            'idLicencia' => $request->input('idLicencia'),
            'idSolicitud' => 1,
            'fechaResolucion' => $request->input('fechaResolucion'),
            'numeroResolucion' => $request->input('numeroResolucion'),
            'numeroCertificado' => $request->input('numeroCertificado'),
            'vigenciaCertificado' => $request->input('vigenciaCertificado'),
            'inspector_1' => $request->input('inspector_1'),
            'inspector_2' => $request->input('inspector_2'),
            'fechaInspeccion_1' => $request->input('fechaInspeccion_1'),
            'fechaInspeccion_2' => $request->input('fechaIsnpeccion_2'),
            'fechaInspeccion_3' => $request->input('fechaIsnpeccion_3'),
            'fechaInspeccionILO' => $request->input('fechaIsnpeccionILO'),
            'fechaDevolucion_1' => $request->input('fechaDevolucion_1'),
            'fechaDevolucion_2' => $request->input('fechaDevolucion_2'),
            'numeroObservaciones' => $request->input('numeroObservaciones'),
            'idAreaRecepcion' => 1,
            'pagoDerechoInspeccion' => $request->input('pagoDerechoInspeccion')
        ]);

        return $control;
    }
}




<?php

namespace App\Http\Consultas;

use App\Http\Requests\ControlRequest;
use App\Http\Services\ServicesControl;
use App\Models\control;

class ControlConsulta
{

    protected $ServicesControl;

    public function __construct(ServicesControl $ServicesControl)
    {
        $this->ServicesControl = $ServicesControl;
    }

    public function getAll()
    {

        $result = control::with('tipoItse', 'nivelRiesgo', 'solicitud', 'areaRecepcion', 'licencia', 'funcion')->get();

        $data = $this->ServicesControl->extraccionDatosControl($result);

        return $data;
    }

    public function create($request)
    {
        $control = Control::create([
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

    public function filtroId(int $id)
    {
        if (is_int($id)) {
            $data = control::with('tipoItse', 'nivelRiesgo', 'solicitud', 'areaRecepcion', 'licencia', 'funcion')
                ->where('controls.idCont', $id)
                ->get();

            $control = $this->ServicesControl->extraccionDatosControl($data);
        } else {
            $control = 'incompatibilidad de datos en este apartado';
        }

        return $control;
    }

    public function filtroRazonSocial(string $nombreComercial)
    {
        if (is_string($nombreComercial)) {
            $razonSocialControl = control::with('tipoItse', 'nivelRiesgo', 'solicitud', 'areaRecepcion', 'licencia', 'funcion')
                ->where('controls.razonSocial', "like", '%' . $nombreComercial . '%')
                ->get();

            $data = $this->ServicesControl->extraccionDatosControl($razonSocialControl);
        } else {
            $data = 'Incompatibilidad de datos de entrada';
        }



        return $data;
    }

    public function filtroFuncion(int $id)
    {
        if (is_int($id)) {
            $funcionControl = control::with('tipoItse', 'nivelRiesgo', 'solicitud', 'areaRecepcion', 'licencia', 'funcion')
                ->where('controls.idFuncion', "=", $id)
                ->get();

            $data = $this->ServicesControl->extraccionDatosControl($funcionControl);
        } else {
            $data = 'Incompatibilidad de datos de entrada';
        }


        return $data;
    }

    public function filtroTipoItse(int $tipoItse)
    {
        if (is_int($tipoItse)) {
            $tipoItseControl = control::with('tipoItse', 'nivelRiesgo', 'solicitud', 'areaRecepcion', 'licencia', 'funcion')
                ->where('controls.idTipoItse', "=", $tipoItse)
                ->get();

            $data = $this->ServicesControl->extraccionDatosControl($tipoItseControl);
        } else {
            $data = 'Incompatibilidad de datos de entrada';
        }

        return $data;
    }

    public function filtroNumeroExpediente(string $numeroExpediente)
    {
        if (is_string($numeroExpediente)) {
            $numeroExpedienteControl = control::with('tipoItse', 'nivelRiesgo', 'solicitud', 'areaRecepcion', 'licencia', 'funcion')
                ->where('controls.numeroExpediente', "=", $numeroExpediente)
                ->get();

            $data = $this->ServicesControl->extraccionDatosControl($numeroExpedienteControl);
        } else {
            $data = 'Incompatibilidad de datos de entrada';
        }

        return $data;
    }

    public function update($request, $id){
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

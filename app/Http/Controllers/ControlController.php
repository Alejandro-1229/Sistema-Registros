<?php

namespace App\Http\Controllers;

use App\Http\Requests\ControlRequest;
use App\Http\Responses\ApiResponse;
use App\Models\control;
use App\Models\Funcion;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class ControlController extends Controller
{



    public function getAll()
    {
        try {
            $result = control::with('tipoItse', 'nivelRiesgo', 'solicitud', 'areaRecepcion', 'licencia', 'funcion')->get();

            $extraccionDatos = function ($funcion) {
                $data = [
                    'numeroExpediente' => $funcion->numeroExpediente,
                    'tipoItse' => $funcion->tipoItse->tipo_itse,
                    'funcion' => $funcion->funcion->funcion,
                    'nivelRiesgo' => $funcion->nivelRiesgo->nivel_riesgo,
                    'nombreComercial' => $funcion->razonSocial,
                    'giroNegocio' => $funcion->giroDelNegocio,
                    'datosSolicitante' => $funcion->datosSolicitante,
                    'fechaIngreso' => $funcion->fechaIngreso,
                    'fechaIngresoSGDC' => $funcion->fechaIngresoSGDC,
                    'barrio' => $funcion->barrio,
                    'nombreHabilitacionUrbana' => $funcion->nombreHabilitacionUrbana,
                    'areaOcupada' => $funcion->areaOcupada,
                    'numeroPisos' => $funcion->numeroPisos,
                    'manzana' => $funcion->manzana,
                    'lote' => $funcion->lote,
                    'tipoVia' => $funcion->tipoVia,
                    'nombreVia' => $funcion->nombreVia,
                    'numeroMunicipal' => $funcion->numeroMunicipal,
                    'licencia' => $funcion->licencia->activo,
                    'solicitud' => $funcion->solicitud->solicitud,
                    'fechaResolucion' => $funcion->fechaResolucion,
                    'numeroResolucion' => $funcion->numeroResolucion,
                    'numeroCertificado' => $funcion->numeroCertificado,
                    'vigenciaCertificado' => $funcion->vigenciaCertificado,
                    'inspector_1' => $funcion->inspector_1,
                    'inspector_2' => $funcion->inspector_2,
                    'fechaInspeccion_1' => $funcion->fechaInspeccion_1,
                    'fechaInspeccion_2' => $funcion->fechaInspeccion_2,
                    'fechaInspeccion_3' => $funcion->fechaInspeccion_3,
                    'fechaInspeccionILO' => $funcion->fechaInspeccionILO,
                    'fechaDevolucion_1' => $funcion->fechaDevolucion_1,
                    'fechaDevolucion_2' => $funcion->fechaDevolucion_2,
                    'numeroObservaciones' => $funcion->numeroObservaciones,
                    'areaRecepcion' => $funcion->areaRecepcion->area,
                    'pagoDerechoInspeccion' => $funcion->pagoDerechoInspeccion,

                ];
                return $data;
            };


            $controles = $result->map($extraccionDatos);

            return ApiResponse::success("Solicitud Exitosa", 200, $controles);
        } catch (\Throwable $th) {
            return ApiResponse::error($th->getMessage(), 500);
        }
    }

    public function create(ControlRequest $request)
    {

        try {

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
                'idSolicitud' => 0,
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
                'idAreaRecepcion' => 0,
                'pagoDerechoInspeccion' => $request->input('pagoDerechoInspeccion')
            ]);

            return ApiResponse::success("Creacion Satisfactoria", 201, $control);
        } catch (\Throwable $th) {
            return ApiResponse::error($th->getMessage(), 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function filtroRazonSocial(string $nombreComercial)
    {
        //
        $razonSocialControl = control::with('tipoItse', 'nivelRiesgo', 'solicitud', 'areaRecepcion', 'licencia', 'funcion')
            ->where('controls.razonSocial', "like", '%' . $nombreComercial . '%')
            ->get();
        if ($razonSocialControl->isEmpty()) {
            $controlRazonSocial = 'La data está vacía prueba con otro nombre';
        } else {
            $extraccionDatos = function ($funcion) {
                $data = [
                    'numeroExpediente' => $funcion->numeroExpediente,
                    'tipoItse' => $funcion->tipoItse->tipo_itse,
                    'funcion' => $funcion->funcion->funcion,
                    'nivelRiesgo' => $funcion->nivelRiesgo->nivel_riesgo,
                    'nombreComercial' => $funcion->razonSocial,
                    'giroNegocio' => $funcion->giroDelNegocio,
                    'datosSolicitante' => $funcion->datosSolicitante,
                    'fechaIngreso' => $funcion->fechaIngreso,
                    'fechaIngresoSGDC' => $funcion->fechaIngresoSGDC,
                    'barrio' => $funcion->barrio,
                    'nombreHabilitacionUrbana' => $funcion->nombreHabilitacionUrbana,
                    'areaOcupada' => $funcion->areaOcupada,
                    'numeroPisos' => $funcion->numeroPisos,
                    'manzana' => $funcion->manzana,
                    'lote' => $funcion->lote,
                    'tipoVia' => $funcion->tipoVia,
                    'nombreVia' => $funcion->nombreVia,
                    'numeroMunicipal' => $funcion->numeroMunicipal,
                    'licencia' => $funcion->licencia->activo,
                    'solicitud' => $funcion->solicitud->solicitud,
                    'fechaResolucion' => $funcion->fechaResolucion,
                    'numeroResolucion' => $funcion->numeroResolucion,
                    'numeroCertificado' => $funcion->numeroCertificado,
                    'vigenciaCertificado' => $funcion->vigenciaCertificado,
                    'inspector_1' => $funcion->inspector_1,
                    'inspector_2' => $funcion->inspector_2,
                    'fechaInspeccion_1' => $funcion->fechaInspeccion_1,
                    'fechaInspeccion_2' => $funcion->fechaInspeccion_2,
                    'fechaInspeccion_3' => $funcion->fechaInspeccion_3,
                    'fechaInspeccionILO' => $funcion->fechaInspeccionILO,
                    'fechaDevolucion_1' => $funcion->fechaDevolucion_1,
                    'fechaDevolucion_2' => $funcion->fechaDevolucion_2,
                    'numeroObservaciones' => $funcion->numeroObservaciones,
                    'areaRecepcion' => $funcion->areaRecepcion->area,
                    'pagoDerechoInspeccion' => $funcion->pagoDerechoInspeccion,

                ];
                return $data;
            };
            $controlRazonSocial = $razonSocialControl->map($extraccionDatos);
        }


        return ApiResponse::success("Solicitud Exitosa", 200, $controlRazonSocial);
    }
    public function filtroFuncion(int $id)
    {
        //
        $funcionControl = control::with('tipoItse', 'nivelRiesgo', 'solicitud', 'areaRecepcion', 'licencia', 'funcion')
            ->where('controls.idFuncion', "=", $id)
            ->get();
        if ($funcionControl->isEmpty()) {
            $controlFunciones = 'La data está vacía prueba con otro';
        } else {
            $extraccionDatos = function ($funcion) {
                $data = [
                    'numeroExpediente' => $funcion->numeroExpediente,
                    'tipoItse' => $funcion->tipoItse->tipo_itse,
                    'funcion' => $funcion->funcion->funcion,
                    'nivelRiesgo' => $funcion->nivelRiesgo->nivel_riesgo,
                    'nombreComercial' => $funcion->razonSocial,
                    'giroNegocio' => $funcion->giroDelNegocio,
                    'datosSolicitante' => $funcion->datosSolicitante,
                    'fechaIngreso' => $funcion->fechaIngreso,
                    'fechaIngresoSGDC' => $funcion->fechaIngresoSGDC,
                    'barrio' => $funcion->barrio,
                    'nombreHabilitacionUrbana' => $funcion->nombreHabilitacionUrbana,
                    'areaOcupada' => $funcion->areaOcupada,
                    'numeroPisos' => $funcion->numeroPisos,
                    'manzana' => $funcion->manzana,
                    'lote' => $funcion->lote,
                    'tipoVia' => $funcion->tipoVia,
                    'nombreVia' => $funcion->nombreVia,
                    'numeroMunicipal' => $funcion->numeroMunicipal,
                    'licencia' => $funcion->licencia->activo,
                    'solicitud' => $funcion->solicitud->solicitud,
                    'fechaResolucion' => $funcion->fechaResolucion,
                    'numeroResolucion' => $funcion->numeroResolucion,
                    'numeroCertificado' => $funcion->numeroCertificado,
                    'vigenciaCertificado' => $funcion->vigenciaCertificado,
                    'inspector_1' => $funcion->inspector_1,
                    'inspector_2' => $funcion->inspector_2,
                    'fechaInspeccion_1' => $funcion->fechaInspeccion_1,
                    'fechaInspeccion_2' => $funcion->fechaInspeccion_2,
                    'fechaInspeccion_3' => $funcion->fechaInspeccion_3,
                    'fechaInspeccionILO' => $funcion->fechaInspeccionILO,
                    'fechaDevolucion_1' => $funcion->fechaDevolucion_1,
                    'fechaDevolucion_2' => $funcion->fechaDevolucion_2,
                    'numeroObservaciones' => $funcion->numeroObservaciones,
                    'areaRecepcion' => $funcion->areaRecepcion->area,
                    'pagoDerechoInspeccion' => $funcion->pagoDerechoInspeccion,

                ];
                return $data;
            };

            $controlFunciones = $funcionControl->map($extraccionDatos);
        }



        return ApiResponse::success("Solicitud Exitosa", 200, $controlFunciones);
    }
    public function filtroTipoItse(int $tipoItse)
    {
        //
        $tipoItseControl = control::with('tipoItse', 'nivelRiesgo', 'solicitud', 'areaRecepcion', 'licencia', 'funcion')
            ->where('controls.idTipoItse', "=", $tipoItse)
            ->get();
        if ($tipoItseControl->isEmpty()) {
            $controlTipoItse = 'La data está vacía prueba con otro nombre';
        } else {
            $extraccionDatos = function ($funcion) {
                $data = [
                    'numeroExpediente' => $funcion->numeroExpediente,
                    'tipoItse' => $funcion->tipoItse->tipo_itse,
                    'funcion' => $funcion->funcion->funcion,
                    'nivelRiesgo' => $funcion->nivelRiesgo->nivel_riesgo,
                    'nombreComercial' => $funcion->razonSocial,
                    'giroNegocio' => $funcion->giroDelNegocio,
                    'datosSolicitante' => $funcion->datosSolicitante,
                    'fechaIngreso' => $funcion->fechaIngreso,
                    'fechaIngresoSGDC' => $funcion->fechaIngresoSGDC,
                    'barrio' => $funcion->barrio,
                    'nombreHabilitacionUrbana' => $funcion->nombreHabilitacionUrbana,
                    'areaOcupada' => $funcion->areaOcupada,
                    'numeroPisos' => $funcion->numeroPisos,
                    'manzana' => $funcion->manzana,
                    'lote' => $funcion->lote,
                    'tipoVia' => $funcion->tipoVia,
                    'nombreVia' => $funcion->nombreVia,
                    'numeroMunicipal' => $funcion->numeroMunicipal,
                    'licencia' => $funcion->licencia->activo,
                    'solicitud' => $funcion->solicitud->solicitud,
                    'fechaResolucion' => $funcion->fechaResolucion,
                    'numeroResolucion' => $funcion->numeroResolucion,
                    'numeroCertificado' => $funcion->numeroCertificado,
                    'vigenciaCertificado' => $funcion->vigenciaCertificado,
                    'inspector_1' => $funcion->inspector_1,
                    'inspector_2' => $funcion->inspector_2,
                    'fechaInspeccion_1' => $funcion->fechaInspeccion_1,
                    'fechaInspeccion_2' => $funcion->fechaInspeccion_2,
                    'fechaInspeccion_3' => $funcion->fechaInspeccion_3,
                    'fechaInspeccionILO' => $funcion->fechaInspeccionILO,
                    'fechaDevolucion_1' => $funcion->fechaDevolucion_1,
                    'fechaDevolucion_2' => $funcion->fechaDevolucion_2,
                    'numeroObservaciones' => $funcion->numeroObservaciones,
                    'areaRecepcion' => $funcion->areaRecepcion->area,
                    'pagoDerechoInspeccion' => $funcion->pagoDerechoInspeccion,

                ];
                return $data;
            };
            $controlTipoItse = $tipoItseControl->map($extraccionDatos);
        }


        return ApiResponse::success("Solicitud Exitosa", 200, $controlTipoItse);
    }
    public function filtroNumeroExpediente(string $numeroExpediente)
    {
        //
        $numeroExpedienteControl = control::with('tipoItse', 'nivelRiesgo', 'solicitud', 'areaRecepcion', 'licencia', 'funcion')
            ->where('controls.numeroExpediente', "=", $numeroExpediente)
            ->get();
        if ($numeroExpedienteControl->isEmpty()) {
            $controlNumeroExpediente = 'La data está vacía prueba con otro nombre';
        } else {
            $extraccionDatos = function ($funcion) {
                $data = [
                    'numeroExpediente' => $funcion->numeroExpediente,
                    'tipoItse' => $funcion->tipoItse->tipo_itse,
                    'funcion' => $funcion->funcion->funcion,
                    'nivelRiesgo' => $funcion->nivelRiesgo->nivel_riesgo,
                    'nombreComercial' => $funcion->razonSocial,
                    'giroNegocio' => $funcion->giroDelNegocio,
                    'datosSolicitante' => $funcion->datosSolicitante,
                    'fechaIngreso' => $funcion->fechaIngreso,
                    'fechaIngresoSGDC' => $funcion->fechaIngresoSGDC,
                    'barrio' => $funcion->barrio,
                    'nombreHabilitacionUrbana' => $funcion->nombreHabilitacionUrbana,
                    'areaOcupada' => $funcion->areaOcupada,
                    'numeroPisos' => $funcion->numeroPisos,
                    'manzana' => $funcion->manzana,
                    'lote' => $funcion->lote,
                    'tipoVia' => $funcion->tipoVia,
                    'nombreVia' => $funcion->nombreVia,
                    'numeroMunicipal' => $funcion->numeroMunicipal,
                    'licencia' => $funcion->licencia->activo,
                    'solicitud' => $funcion->solicitud->solicitud,
                    'fechaResolucion' => $funcion->fechaResolucion,
                    'numeroResolucion' => $funcion->numeroResolucion,
                    'numeroCertificado' => $funcion->numeroCertificado,
                    'vigenciaCertificado' => $funcion->vigenciaCertificado,
                    'inspector_1' => $funcion->inspector_1,
                    'inspector_2' => $funcion->inspector_2,
                    'fechaInspeccion_1' => $funcion->fechaInspeccion_1,
                    'fechaInspeccion_2' => $funcion->fechaInspeccion_2,
                    'fechaInspeccion_3' => $funcion->fechaInspeccion_3,
                    'fechaInspeccionILO' => $funcion->fechaInspeccionILO,
                    'fechaDevolucion_1' => $funcion->fechaDevolucion_1,
                    'fechaDevolucion_2' => $funcion->fechaDevolucion_2,
                    'numeroObservaciones' => $funcion->numeroObservaciones,
                    'areaRecepcion' => $funcion->areaRecepcion->area,
                    'pagoDerechoInspeccion' => $funcion->pagoDerechoInspeccion,

                ];
                return $data;
            };
            $controlNumeroExpediente = $numeroExpedienteControl->map($extraccionDatos);
        }


        return ApiResponse::success("Solicitud Exitosa", 200, $controlNumeroExpediente);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, control $control)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(control $control)
    {
        //
    }
}

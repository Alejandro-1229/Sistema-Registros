<?php

namespace App\Http\Services;

class ServicesControl{
 
    public function extraccionDatosControl($result){
        if ($result->isEmpty()) {
            $controles = 'No hay data en este apartado';
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
            $controles = $result->map($extraccionDatos);
        }

        return $controles;

    }



}
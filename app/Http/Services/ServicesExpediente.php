<?php

namespace App\Http\Services;

class ServicesExpediente{

    public function extraccionDatosExpediente($expedientes){
        if ($expedientes->isEmpty()) {

            $extract_data = 'La data está vacía';

        } else {
            $selected_data = function($expediente){
                $data = [
                    'idExpe' => $expediente->idExpe,
                    'numeroExpediente' => $expediente->numeroExpediente,
                    'ruc' => $expediente->ruc,
                    'nombreComercial' => $expediente->razonSocial,
                    'direccion'=> $expediente->tipoVia.'. '.$expediente->nombreVia.' '.$expediente->numeroMunicipal.' '.$expediente->barrio.'. '.$expediente->nombreHabilitacionUrbana,
                    'Tipo' => $expediente->tipo_itse.'('.$expediente->nivel_riesgo.')',
                    'inspector' => $expediente->inspector_1,
                    'fechaIngresoMesaPartes' => $expediente->fechaIngresoMesaPartes,
                    'fechaIngresoSGDC' => $expediente-> fechaIngresoSGDC,
                    'fechaRecepcionInpeccion' => $expediente->fechaRecepcionInspeccion,
                    'recepcionLicenciaFuncionamiento' => $expediente->recepcionLicenciaFuncionamiento,
                    'fechaLimiteInspeccion' => $expediente->fechaLimiteInspeccion,
                    'numeroInforme' => $expediente->numeroInforme,
                    'estado' => $expediente->estado,
                    'fecha' => $expediente->fecha,
                    'hora' => $expediente->hora,
                    'inspectores' => $expediente->inspector_1.', '.$expediente->inspector_2,
                    'ILO' => $expediente->ILO
                ];

                return $data;
            };

            $extract_data = $expedientes->map($selected_data);
        }

        return $extract_data;
        
    }
}
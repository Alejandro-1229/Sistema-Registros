<?php

namespace App\Http\Services;

class ServicesProgramacion
{
    public function extraccionDatosProgramacion($programaciones)
    {
        if ($programaciones->isEmpty()) {
            $data = 'No hay data disponible en este apartado';
        } else {
            $extraccionDatos = function ($programacion) {
                $data = [
                    'numeroExpediente' => $programacion->numeroExpediente,
                    'nombreComercial' => $programacion->razonSocial . ' - ' . $programacion->nombreEstablecimiento,
                    'direccion' => $programacion->tipoVia . ' ' . $programacion->nombreVia . ' ' . $programacion->numeroMunicipal,
                    'Tipo' => $programacion->tipo_itse . '(' . $programacion->nivel_riesgo . ')',
                    'inspector' => $programacion->inspector_1,
                    'fechaDevolucion' => $programacion->fechaDevolucion
                ];
                return $data;
            };

            $data = $programaciones->map($extraccionDatos);
        }

        return $data;
    }
}

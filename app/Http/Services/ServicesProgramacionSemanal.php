<?php

namespace App\Http\Services;
 
class ServicesProgramacionSemanal
{
    public function extraccionDatosProgSemanal($data)
    {
        if ($data->isEmpty()) {
            $dataFiltrada = 'No hay data disponible';
        } else {
            $extraccionData = function ($programacionSemanal) {
                $data = [
                    'numeroExpediente' => $programacionSemanal->numeroExpediente,
                    'funcion' => $programacionSemanal->funcion,
                    'local' => $programacionSemanal->razonSocial,
                    'direccion' => $programacionSemanal->tipoVia . ' ' . $programacionSemanal->nombreVia . ' ' . $programacionSemanal->numeroMunicipal,
                    'inspector_1' => $programacionSemanal->inspector_1,
                    'inspector_2' => $programacionSemanal->inspector_2,
                    'fecha' => $programacionSemanal->fechaLimiteInspeccion,
                    'estado' => $programacionSemanal->realizado
                ];

                return $data;
            };

            $dataFiltrada = $data->map($extraccionData);
        }

        return $dataFiltrada;
    }
}

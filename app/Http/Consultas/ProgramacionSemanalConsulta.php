<?php

namespace App\Http\Consultas;

use App\Http\Services\ServicesProgramacionSemanal;
use App\Models\Expediente;
use App\Models\programacion_semanal; 
use Carbon\Carbon;

class ProgramacionSemanalConsulta
{
    protected $ServicesProgramacionSemanal;

    public function __construct(ServicesProgramacionSemanal $ServicesProgramacionSemanal)
    {
        return $this->ServicesProgramacionSemanal = $ServicesProgramacionSemanal;
    }

    public function consultaEstado($id)
    {
        $data = programacion_semanal::select('idPrSe','fechaInspeccion','numeroExp', 'funcs', 'local', 'direccion', 'ingeniero_1', 'ingeniero_2', 'realizado')
            ->where('programacion_semanals.realizado', '=', $id)
            ->get();

        if ($data->isEmpty()) { 
            $data = 'Por el momento no hay data';
        }

        return $data;
    }

    public function listPendiente()
    {
        $listadoPendientes = $this->consultaEstado("0");

        return $listadoPendientes;
    }

    public function listCancelado() 
    {
        $listadoCancelados = $this->consultaEstado("3");

        return $listadoCancelados;
    }
 
    public function listSilencioPositivo()
    {
        $listadoSilencioPositivos = $this->consultaEstado("2");

        return $listadoSilencioPositivos;
    }

    public function getUltimoElemento()
    {
        $programacionSemanalUnitario = programacion_semanal::join('expedientes', 'programacion_semanals.idExpediente', '=', 'expedientes.idExpe')
            ->join('controls', 'expedientes.idControl', '=', 'controls.idCont')
            ->join('funcions', 'controls.idFuncion', '=', 'funcions.idFunc')
            ->orderBy('programacion_semanals.idPrSe', 'desc')
            ->take(1)
            ->get();

        $data = $this->ServicesProgramacionSemanal->extraccionDatosProgSemanal($programacionSemanalUnitario);

        return $data;
    }
}

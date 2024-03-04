<?php

namespace App\Http\Consultas;

use App\Models\programacion_semanal; 
use Illuminate\Support\Facades\DB;

class ProgramacionSemanalConsulta
{
    /*
    protected $ServicesProgramacionSemanal;

    public function __construct(ServicesProgramacionSemanal $ServicesProgramacionSemanal)
    {
        return $this->ServicesProgramacionSemanal = $ServicesProgramacionSemanal;
    }
    */

    public function consultaEstado($id)
    {
        $data = programacion_semanal::select('idPrSe','fechaInspeccion','numeroExp', 'funcs', 'local', 'direccion', 'ingeniero_1', 'ingeniero_2', 'realizado','estado')
            ->join('estados','estados.idEsta','=','programacion_semanals.idEstado')
            ->where('programacion_semanals.realizado', '=', $id)
            ->orderBy('programacion_semanals.fechaInspeccion','desc')
            ->paginate(10);

        $totalPages = $data->lastPage();

        if ($data->isEmpty()) { 
            $data = 'Por el momento no hay data';
        }

        $datas = [
            'Total paginas' => $totalPages,
            'Data' => $data
        ];

        return $datas;
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

    public function getUltimoElemento($id)
    {
        $programacionSemanalUnitario = programacion_semanal::select( 'expedientes.fechaLimiteInspeccion AS fecha',
                                                            'controls.numeroExpediente AS numeroExpediente', 
                                                            DB::raw("CONCAT(controls.tipoVia, ' ', controls.nombreVia, ' N.º', controls.numeroMunicipal) AS direccion"),
                                                            'controls.razonSocial AS local',
                                                            'funcions.funcion AS funcion', 
                                                            'controls.inspector_1 AS inspector_1', 
                                                            'controls.inspector_2 AS inspector_2',
                                                            'estados.estado AS estado')
                                        ->join('expedientes', 'programacion_semanals.idExpediente', '=', 'expedientes.idExpe')
                                        ->join('controls', 'expedientes.idControl', '=', 'controls.idCont')
                                        ->join('funcions', 'controls.idFuncion', '=', 'funcions.idFunc')
                                        ->join('estados','estados.idEsta','=','programacion_semanals.idEstado')
                                        ->where('programacion_semanals.idPrSe','=',$id)
                                        ->get();

        return $programacionSemanalUnitario;
    }
}

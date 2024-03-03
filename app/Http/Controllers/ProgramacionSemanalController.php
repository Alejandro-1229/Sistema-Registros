<?php

namespace App\Http\Controllers;

use App\Http\Consultas\ProgramacionSemanalConsulta;
use App\Http\Consultas\ProgramacionSemanalUpdate;
use App\Http\Requests\ProgramacionSemanalRequest;
use App\Http\Responses\ApiResponse;
use App\Models\programacion_semanal;
use Carbon\Carbon;

class ProgramacionSemanalController extends Controller
{

    protected $ProgramacionSemanalConsulta;
    protected $ProgramacionSemanalUpdate;

    public function __construct(ProgramacionSemanalConsulta $ProgramacionSemanalConsulta, ProgramacionSemanalUpdate $ProgramacionSemanalUpdate)
    {
        $this->ProgramacionSemanalConsulta = $ProgramacionSemanalConsulta;
        $this->ProgramacionSemanalUpdate = $ProgramacionSemanalUpdate;
    }

    public function listPendiente()
    {
        try {

            $data = $this->ProgramacionSemanalConsulta->listPendiente();
            return ApiResponse::success('Proceso Exitoso', 200, $data);
        } catch (\Throwable $th) {
            return ApiResponse::error($th->getMessage(), 500);
        }
    }

    public function listCancelado()
    {
        try {

            $listadoInspeccionesCanceladas = $this->ProgramacionSemanalConsulta->listCancelado();

            return ApiResponse::update('Update Date Succesfull', 200, $listadoInspeccionesCanceladas);
        } catch (\Throwable $th) {
            return ApiResponse::error($th->getMessage(), 500);
        }
    }

    public function listSilencioPositivo()
    {
        try {

            $listadoInspeccionesSilecioPositivo = $this->ProgramacionSemanalConsulta->listSilencioPositivo();

            return ApiResponse::update('Update Date Succesfull', 200, $listadoInspeccionesSilecioPositivo);
        } catch (\Throwable $th) {
            return ApiResponse::error($th->getMessage(), 500);
        }
    }

    public function create(ProgramacionSemanalRequest $request)
    {
        try {
            //creacion del elemento
            $newData = programacion_semanal::create([
                'idExpediente' => $request->input('idExpediente'),
            ]);

            //extraccion del id del elemento creado
            $idNewData = $newData->idPrSe;

            $dataUpdate = $this->ProgramacionSemanalUpdate->asignacionDatos($idNewData);

            return ApiResponse::success('Create Succesfull', 201, $dataUpdate);
        } catch (\Throwable $th) {

            return ApiResponse::success($th->getMessage(), 500);
        }
    }

    public function verificacionFechas()
    {
        $rpta = '';

        //extraccion de la feha actual
        $fechaActual = Carbon::now();
        $nuevaFecha = $fechaActual->subHours(5);

        $dataInspeccion = $this->ProgramacionSemanalConsulta->listPendiente();

        foreach ($dataInspeccion as $dato) {
            // Convertir la fecha de inspección a objeto Carbon
            $fechaInspeccion = Carbon::parse($dato['fechaInspeccion']);
        
            // Comparar las fechas en que si fechaInspeccion es menor a la fecha Actual;
            if ($fechaInspeccion->lt($nuevaFecha)) {
                // Actualizar el campo "realizado" a 2
                $dato['realizado'] = 2;

                $this->ProgramacionSemanalUpdate->updateSilencioPositivo($dato['idPrSe']);

                $rpta .= "Se actualizó el campo 'realizado' para el ID {$dato['idPrSe']} a 2<br>";
                
            }
        }
        
        return $rpta;
    }

    public function updatePendiente($id)
    {
        try {

            $dataUpdateRealizado = $this->ProgramacionSemanalUpdate->updatePendiente($id);

            return ApiResponse::update('Update Realize Succesfull', 200, $dataUpdateRealizado);
        } catch (\Throwable $th) {
            return ApiResponse::error($th->getMessage(), 500);
        }
    }

    public function updateCancelar($id)
    {
        try {

            $dataUpdateRealizado = $this->ProgramacionSemanalUpdate->updateCancelar($id);

            return ApiResponse::update('Update Cancel Succesfull', 200, $dataUpdateRealizado);
        } catch (\Throwable $th) {
            return ApiResponse::error($th->getMessage(), 500);
        }
    }
}

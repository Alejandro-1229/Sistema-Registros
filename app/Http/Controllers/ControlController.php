<?php

namespace App\Http\Controllers;

use App\Http\Consultas\ControlConsulta;
use App\Http\Consultas\ControlUpdate;
use App\Http\Requests\ControlRequest;
use App\Http\Responses\ApiResponse;
use App\Models\control;
use Illuminate\Http\Request;

class ControlController extends Controller
{
    protected $ControlConsulta;
    protected $ControlUpdate;

    public function __construct(ControlConsulta $ControlConsulta, ControlUpdate $ControlUpdate)
    {
        $this->ControlConsulta = $ControlConsulta;
        $this->ControlUpdate = $ControlUpdate;
    }


    public function getAll()
    { 
        try {

            $controles = $this->ControlConsulta->getAll();

            return ApiResponse::success("Solicitud Exitosa", 200, $controles);
        } catch (\Throwable $th) {
            return ApiResponse::error($th->getMessage(), 500);
        }
    }

    public function create(ControlRequest $request)
    {
        try {

            $control = $this->ControlConsulta->create($request);

            return ApiResponse::success("Creacion Satisfactoria", 201, $control);
        } catch (\Throwable $th) {
            return ApiResponse::error($th->getMessage(), 500);
        }
    }

    public function filtroId($id)
    {
        try {

            $control = $this->ControlConsulta->filtroId($id);

            return ApiResponse::success("Solicitud exitosa", 200, $control);
        } catch (\Throwable $th) {
            return ApiResponse::error($th->getMessage(), 500);
        }
    }

    public function filtroRazonSocial($nombreComercial)
    {
        try {

            $controlRazonSocial = $this->ControlConsulta->filtroRazonSocial($nombreComercial);

            return ApiResponse::success("Solicitud Exitosa", 200, $controlRazonSocial);
        } catch (\Throwable $th) {
            return ApiResponse::error($th->getMessage(), 500);
        }
    }
    public function filtroFuncion($id)
    {
        try {

            $controlFunciones = $this->ControlConsulta->filtroFuncion($id);

            return ApiResponse::success("Solicitud Exitosa", 200, $controlFunciones);
        } catch (\Throwable $th) {
            return ApiResponse::error($th->getMessage(), 500);
        }
    }
    public function filtroTipoItse(int $tipoItse)
    {
        try {

            $controlFunciones = $this->ControlConsulta->filtroTipoItse($tipoItse);

            return ApiResponse::success("Solicitud Exitosa", 200, $controlFunciones);
        } catch (\Throwable $th) {
            return ApiResponse::error($th->getMessage(), 500);
        }

    }
    public function filtroNumeroExpediente(string $expediente)
    {
        try {

            $controlNumeroExpediente = $this->ControlConsulta->filtroNumeroExpediente($expediente);

            return ApiResponse::success("Solicitud Exitosa", 200, $controlNumeroExpediente);
        } catch (\Throwable $th) {
            return ApiResponse::error($th->getMessage(), 500);
        }

    }


    public function update(Request $request, int $id)
    {
        try {

            $datoActualizado = $this->ControlUpdate->updateControl($request,$id);

            return ApiResponse::update("Actualizacion Exitosa", 200, $datoActualizado);
        } catch (\Throwable $th) {
            return ApiResponse::error($th->getMessage(), 500);
        }
    }
}

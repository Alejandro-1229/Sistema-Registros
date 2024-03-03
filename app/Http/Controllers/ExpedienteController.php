<?php

namespace App\Http\Controllers;

use App\Http\Consultas\ExpedienteConsulta;
use App\Http\Consultas\ExpedienteUpdate;
use App\Http\Requests\ExpedienteRequest;
use App\Http\Responses\ApiResponse;

class ExpedienteController extends Controller
{ 
    
    protected $ExpedienteConsulta;
    protected $ExpedienteUpdate;

    public function __construct(ExpedienteConsulta $ExpedienteConsulta, ExpedienteUpdate $ExpedienteUpdate)
    {
        $this->ExpedienteConsulta = $ExpedienteConsulta;
        $this->ExpedienteUpdate = $ExpedienteUpdate;
    }

    public function getAll() 
    {
        try {

            $extract_data = $this->ExpedienteConsulta->getAll();

            return ApiResponse::success('Solicitud exitosa', 200, $extract_data);
        } catch (\Throwable $th) {
            return ApiResponse::error($th->getMessage(),500);
        }
    }

    public function create(ExpedienteRequest $request)
    {
        try {
            
            $data = $this->ExpedienteConsulta->create($request);
            
            return ApiResponse::success('Create Succesfull',201, $data);
        } catch (\Throwable $th) {
            return ApiResponse::error($th->getMessage(),500);
        }
    }

    public function update(ExpedienteRequest $request, $id){
        try {

            $expedienteUpdate = $this->ExpedienteUpdate->updateExpediente($request, $id);

            return ApiResponse::success('Update Succesfull',201, $expedienteUpdate);
        } catch (\Throwable $th) {
            return ApiResponse::error($th->getMessage(),500);
        }
        
    }
}

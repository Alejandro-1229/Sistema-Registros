<?php

namespace App\Http\Controllers;

use App\Http\Consultas\ProgramacionSemanalConsulta;
use App\Http\Consultas\ProgramacionSemanalUpdate;
use App\Http\Requests\ProgramacionSemanalRequest;
use App\Http\Responses\ApiResponse;
use App\Models\programacion_semanal;
use Illuminate\Http\Request;

class ProgramacionSemanalController extends Controller
{

    protected $ProgramacionSemanalConsulta;
    protected $ProgramacionSemanalUpdate;

    public function __construct(ProgramacionSemanalConsulta $ProgramacionSemanalConsulta, ProgramacionSemanalUpdate $ProgramacionSemanalUpdate)
    {
        $this->ProgramacionSemanalConsulta = $ProgramacionSemanalConsulta;
        $this->ProgramacionSemanalUpdate = $ProgramacionSemanalUpdate;
    }

    public function getAll()
    {
        try {

            $data = $this->ProgramacionSemanalConsulta->getAll();
            return ApiResponse::success('Proceso Exitoso', 200, $data);
        } catch (\Throwable $th) {
            return ApiResponse::error($th->getMessage(), 500);
        }
    }

    public function create(ProgramacionSemanalRequest $request)
    {
        try {
            //creacion del elemento
            programacion_semanal::create([
                'idExpediente' => $request->input('idExpediente'),

            ]);

            //extraccion del ultimo elemento creado
            $ultimaCreacion = programacion_semanal::latest()->first();
            //extraccion del id del ultimo elemento creado
            $idUltimaCreacion = json_decode($ultimaCreacion, true);
            //se guarda el id en una variable
            $idPrSe = $idUltimaCreacion['idPrSe'];

            $dataUpdate = $this->ProgramacionSemanalUpdate->asignacionDatos($idPrSe);

            return ApiResponse::success('Create Succesfull', 201, $dataUpdate);
        } catch (\Throwable $th) {

            return ApiResponse::success($th->getMessage(), 500);
        }
    }

    public function updateRealizado($id)
    {
        try {

            $dataUpdateRealizado = $this->ProgramacionSemanalUpdate->updateRealizado($id);

            return ApiResponse::update('Update Realize Succesfull', 200, $dataUpdateRealizado);
        } catch (\Throwable $th) {
            return ApiResponse::error($th->getMessage(), 500);
        }
    }

    public function updateAplazoFecha(Request $request, $id)
    {
        try {

            $dataUpdateAplazoFecha = $this->ProgramacionSemanalUpdate->updateAplazoFecha($request, $id);

            return ApiResponse::update('Update Date Succesfull', 200, $dataUpdateAplazoFecha);
        } catch (\Throwable $th) {
            return ApiResponse::error($th->getMessage(), 500);
        }
    }

    public function destroy(programacion_semanal $programacion_semanal)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExpedienteRequest;
use App\Http\Responses\ApiResponse;
use App\Models\Expediente;
use Illuminate\Http\Request;

class ExpedienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getAll()
    {
        // 
        try {



            //$result = Expediente::with('control.tipoItse')->get();

            $expedientes = Expediente::join('controls', 'expedientes.idControl', '=', 'controls.idCont')
                                        ->join('tipo__itses', 'controls.idTipoItse', '=', 'tipo__itses.idTiIt')
                                        ->join('nivel__riesgos', 'controls.idNivelRiesgo', '=', 'nivel__riesgos.idNiRi')
                                        ->get();

            $extract_data = function($expediente){
                $data = [
                    'numeroExpediente' => $expediente->numeroExpediente,
                    'tipoItse' => $expediente->ruc,
                    'nombreComercial' => $expediente->razonSocial,
                    'direccion'=> $expediente->tipoVia.'. '.$expediente->nombreVia.' '.$expediente->numeroMunicipal.' '.$expediente->barrio.'. '.$expediente->nombreHabilitacionUrbana,
                    'Tipo' => $expediente->tipo_itse.'('.$expediente->nivel_riesgo.')',
                    'inspector' => $expediente->inspector_1,
                ];
                return $data;
            };

            $selected_data = $expedientes->map($extract_data);


            return ApiResponse::success('Solicitud exitosa', 200, $selected_data);
            
        } catch (\Throwable $th) {
            return ApiResponse::error($th->getMessage(),500);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(ExpedienteRequest $request)
    {
        //
        try {
            $data = Expediente::create([
                'ruc' => $request->input('ruc'), 
                'idControl' => $request->input('idControl'),
                'fechaIngresoMesaPartes' => $request->input('fechaIngresoMesaPartes'),
                'fechaIngresoSGDC' => $request->input('fechaIngresoSGDC'),
                'fechaRecepcionInspeccion' => $request->input('fechaRecepcionInspeccion'),
                'recepcionLicenciaFuncionamiento' => $request->input('recepcionLicenciaFuncionamiento'),
                'fechaLimiteInspeccion' => $request->input('fechaLimiteInspeccion'),
                'numeroInforme' => $request->input('numeroInforme'),
                'estado' => $request->input('estado'),
                'fecha' => $request->input('fecha'),
                'hora' => $request->input('hora'),
                'ILO' => $request->input('ILO')
            ]);
            
            return ApiResponse::success('Creacion Extosa',201, $data);
        } catch (\Throwable $th) {
            return ApiResponse::error($th->getMessage(),500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Expediente $expediente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Expediente $expediente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Expediente $expediente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Expediente $expediente)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProgramacionRequest;
use App\Http\Responses\ApiResponse;
use App\Models\Programacion;
use Illuminate\Http\Request;

class ProgramacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getAll()
    {
        //
        try {
            //$result = Programacion::with('control.tipoItse', 'control.nivelRiesgo')->get(); ----> funcion llamada que est por probar 


            //consulta multi tabla a la base de datos
            $programaciones = Programacion::join('controls', 'programacions.idControl', '=', 'controls.idCont')
                                        ->join('tipo__itses', 'controls.idTipoItse', '=', 'tipo__itses.idTiIt')
                                        ->join('nivel__riesgos', 'controls.idNivelRiesgo', '=', 'nivel__riesgos.idNiRi')
                                        ->get();

            

            //funcion anonima para llamar extraer los datos
            $extraccionDatos = function($programacion){
                $data = [
                    'numeroExpediente' => $programacion->numeroExpediente,
                    'nombreComercial' => $programacion->razonSocial.' - '.$programacion->nombreEstablecimiento,
                    'direccion'=> $programacion->tipoVia.' '.$programacion->nombreVia.' '.$programacion->numeroMunicipal,
                    'Tipo' => $programacion->tipo_itse.'('.$programacion->nivel_riesgo.')',
                    'inspector' => $programacion->inspector_1,
                ];
                return $data;
            }; 

            //se guardan en una variable
            $data = $programaciones->map($extraccionDatos);

            

            
            return ApiResponse::success("Solicitud Exitosa", 200, $data);

        } catch (\Throwable $th) {
            return ApiResponse::error($th->getMessage(), 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(ProgramacionRequest $request)
    {
        //
        try {
            $programacion = Programacion::create([
                'idControl' => $request->input('idControl'),
                'firma' => $request->input('firma'),
                'fecha' => $request->input('fecha'),
                'hora' => $request->input('hora'),
                'fechaDevolucion' => $request->input('fechaDevolucion')
            ]);

            return ApiResponse::success("Solicitud Exitosa", 200, $programacion);
        } catch (\Throwable $th) {
            return ApiResponse::error($th->getMessage(), 500);
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
    public function show(Programacion $programacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Programacion $programacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Programacion $programacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Programacion $programacion)
    {
        //
    }
}

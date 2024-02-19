<?php

namespace App\Http\Controllers;

use App\Http\Requests\ControlRequest;
use App\Models\control;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class ControlController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getAll()
    {
        try {

            $result = control::all();

            return response()->json($result, 200);

        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()],500);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(ControlRequest $request)
    {
        //
        try{

            $control = Control::create([
                'numeroExpediente' => $request->input('numeroExpediente'),
                'idTipoItse' => $request->input('idTipoItse'),
                'idFuncion' => $request->input('idFuncion'),
                'idNivelRiesgo' => $request->input('idNivelRiesgo'),
                'razonSocial' => $request->input('razonSocial'),
                'nombreEstablecimiento' => $request->input('nombreEstablecimiento'),
                'giroDelNegocio' => $request->input('giroDelNegocio'),
                'datosSolicitante' => $request->input('datosSolicitante'),
                'fechaIngreso' => $request->input('fechaIngreso'),
                'fechaIngresoSGDC' => $request->input('fechaIngresoSGDC'),
                'barrio' => $request->input('barrio'),
                'nombreHabilitacionUrbana' => $request->input('nombreHabilitacionUrbana'),
                'areaOcupada' => $request->input('areaOcupada'),
                'numeroPisos' => $request->input('numeroPisos'),
                'manzana' => $request->input('manzana'),
                'lote' => $request->input('lote'),
                'tipoVia' => $request->input('tipoVia'),
                'nombreVia' => $request->input('nombreVia'),
                'numeroMunicipal' => $request->input('numeroMunicipal'),
                'idLicencia' => $request->input('idLicencia'),
                'idSolicitud' => 0,
                'fechaResolucion' => $request->input('fechaResolucion'),
                'numeroResolucion' => $request->input('numeroResolucion'),
                'numeroCertificado' => $request->input('numeroCertificado'),
                'vigenciaCertificado' => $request->input('vigenciaCertificado'),
                'inspector_1' => $request->input('inspector_1'),
                'inspector_2' => $request->input('inspector_2'),
                'fechaInspeccion_1' => $request->input('fechaInspeccion_1'),
                'fechaInspeccion_2' => $request->input('fechaIsnpeccion_2'),
                'fechaInspeccion_3' => $request->input('fechaIsnpeccion_3'),
                'fechaInspeccionILO' => $request->input('fechaIsnpeccionILO'),
                'fechaDevolucion_1' => $request->input('fechaDevolucion_1'),
                'fechaDevolucion_2' => $request->input('fechaDevolucion_2'),
                'numeroObservaciones' => $request->input('numeroObservaciones'),
                'idAreaRecepcion' => 0,
                'pagoDerechoInspeccion' => $request->input('pagoDerechoInspeccion')
            ]);

            $data = [
                'Message' => 'Control Created succesfull',
                'Control' => $control
            ];
            return response()->json($data, 200);

        }catch(\Throwable $th){
            return response()->json(['error' => $th->getMessage()],500);
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
    public function show(control $control)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(control $control)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, control $control)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(control $control)
    {
        //
    }
}

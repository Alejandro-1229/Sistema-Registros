<?php

namespace App\Http\Controllers;

use App\Http\Consultas\ExpedienteConsulta;
use App\Http\Requests\ExpedienteRequest;
use App\Http\Responses\ApiResponse;
use App\Models\Expediente;
use Illuminate\Http\Client\Request;

class ExpedienteController extends Controller
{
    
    protected $ExpedienteConsulta;

    public function __construct(ExpedienteConsulta $ExpedienteConsulta)
    {
        return $this->ExpedienteConsulta = $ExpedienteConsulta;
    }

    public function getAll() 
    {
        try {
            //$result = Expediente::with('control.tipoItse')->get();

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

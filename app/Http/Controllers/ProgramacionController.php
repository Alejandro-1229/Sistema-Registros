<?php

namespace App\Http\Controllers;

use App\Http\Consultas\ProgramacionConsulta;
use App\Http\Requests\ProgramacionRequest;
use App\Http\Responses\ApiResponse;
use App\Models\Programacion;
use Illuminate\Http\Request;

class ProgramacionController extends Controller
{

    protected $ProgramacionConsulta;

    public function __construct(ProgramacionConsulta $ProgramacionConsulta)
    {
        return $this->ProgramacionConsulta = $ProgramacionConsulta;
    }

    
    public function getAll()
    {
        try {

            $data = $this->ProgramacionConsulta->getAll();

            return ApiResponse::success("Solicitud Exitosa", 200, $data);
        } catch (\Throwable $th) {
            return ApiResponse::error($th->getMessage(), 500);
        }
    }

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

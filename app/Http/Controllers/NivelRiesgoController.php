<?php

namespace App\Http\Controllers;

use App\Http\Responses\ApiResponse;
use App\Models\Nivel_Riesgo;
use Illuminate\Http\Request;

class NivelRiesgoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getAll()
    {
        //
        try {

            $result = Nivel_Riesgo::all();

            return ApiResponse::success("Solicitud Exitosa", 200, $result);

        } catch (\Throwable $th) {
            return ApiResponse::error($th->getMessage(),500);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(Nivel_Riesgo $nivel_Riesgo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Nivel_Riesgo $nivel_Riesgo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Nivel_Riesgo $nivel_Riesgo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Nivel_Riesgo $nivel_Riesgo)
    {
        //
    }
}

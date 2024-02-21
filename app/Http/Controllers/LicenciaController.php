<?php

namespace App\Http\Controllers;

use App\Http\Responses\ApiResponse;
use App\Models\Licencia;
use Illuminate\Http\Request;

class LicenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getAll()
    {
        //
        try {

            $result = Licencia::all();

            return ApiResponse::success("Solicitud Exitosa", 200, $result);

        } catch (\Throwable $th) {
            return ApiResponse::error($th->getMessage(),500);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
        $licencia = Licencia::create([
            'activo' => $request->input('activo')
        ]);

        return response()->json($licencia,200);
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
    public function show(Licencia $licencia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Licencia $licencia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Licencia $licencia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Licencia $licencia)
    {
        //
    }
}

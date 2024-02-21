<?php

namespace App\Http\Controllers;

use App\Http\Responses\ApiResponse;
use App\Models\Tipo_Itse;
use Illuminate\Http\Request;
 
class TipoItseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getAll()
    {
        //
        try {
            $result = Tipo_Itse::all();
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
    public function show(Tipo_Itse $tipo_Itse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tipo_Itse $tipo_Itse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tipo_Itse $tipo_Itse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tipo_Itse $tipo_Itse)
    {
        //
    }
}

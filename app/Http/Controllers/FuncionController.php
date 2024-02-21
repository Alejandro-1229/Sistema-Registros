<?php

namespace App\Http\Controllers;

use App\Http\Responses\ApiResponse;
use App\Models\Funcion;
use Illuminate\Http\Request;

class FuncionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getAll()
    {
        try { 

            $result = Funcion::all();

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
    public function show(Funcion $funcion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Funcion $funcion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Funcion $funcion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Funcion $funcion)
    {
        //
    }
}

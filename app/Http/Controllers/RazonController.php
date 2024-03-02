<?php

namespace App\Http\Controllers;

use App\Http\Responses\ApiResponse;
use App\Models\Razon;
use Illuminate\Http\Request;

class RazonController extends Controller
{

    public function getAll()
    {

        try {

            $razon = Razon::select('idRazon','razon')->get();
            return ApiResponse::success("Solicitud Exitosa", 200, $razon);
        } catch (\Throwable $th) {
            return ApiResponse::error($th->getMessage(), 500);
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
    public function show(Razon $razon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Razon $razon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Razon $razon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Razon $razon)
    {
        //
    }
}

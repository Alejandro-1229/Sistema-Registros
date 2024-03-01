<?php

namespace App\Http\Controllers;

use App\Http\Responses\ApiResponse;
use App\Models\Area_Recepcion;
use Illuminate\Http\Request;

class AreaRecepcionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getAll()
    {
        //
        try {

            $result = Area_Recepcion::all();

            return ApiResponse::success("Solicitud Exitosa", 200, $result);

        } catch (\Throwable $th) {
            return ApiResponse::error($th->getMessage(),500);
        }
    }

    
}

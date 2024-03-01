<?php

namespace App\Http\Controllers;

use App\Http\Responses\ApiResponse;
use App\Models\Solicitud;
use Illuminate\Http\Request;

class SolicitudController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getAll()
    {
        //
        try {

            $result = Solicitud::select('idEsSo','solicitud')->get();

            return ApiResponse::success("Solicitud Exitosa", 200, $result);

        } catch (\Throwable $th) {
            return ApiResponse::error($th->getMessage(),500);
        }
    }

    
}

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
        
        try {
            $result = Tipo_Itse::select('idTiIt','tipo_itse')->get();
            return ApiResponse::success("Solicitud Exitosa", 200, $result);

        } catch (\Throwable $th) {
            return ApiResponse::error($th->getMessage(),500);
        }
    }
}

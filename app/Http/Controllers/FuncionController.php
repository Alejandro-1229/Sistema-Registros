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

            $result = Funcion::select('idFunc','funcion')->get();

            return ApiResponse::success("Solicitud Exitosa", 200, $result);

        } catch (\Throwable $th) {
            return ApiResponse::error($th->getMessage(),500);
        }
    }

}

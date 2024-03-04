<?php

namespace App\Http\Controllers;

use App\Models\Estado;
use Illuminate\Http\Request;

class EstadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getAll()
    {
        $estado = Estado::select('idEsta','estado')->get();

        return $estado;
    }

}

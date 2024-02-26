<?php

namespace App\Http\Consultas;

use App\Http\Services\ServicesProgramacion;
use App\Models\Programacion;

class ProgramacionConsulta
{
 
    protected $ServicesProgramacion;

    public function __construct(ServicesProgramacion $ServicesProgramacion)
    {
        return $this->ServicesProgramacion = $ServicesProgramacion;
    }
    public function getAll()
    {
            //$result = Programacion::with('control.tipoItse', 'control.nivelRiesgo')->get(); ----> funcion llamada que est por probar 
            //consulta multi tabla a la base de datos
            $programaciones = Programacion::join('controls', 'programacions.idControl', '=', 'controls.idCont')
                                        ->join('tipo__itses', 'controls.idTipoItse', '=', 'tipo__itses.idTiIt')
                                        ->join('nivel__riesgos', 'controls.idNivelRiesgo', '=', 'nivel__riesgos.idNiRi')
                                        ->get();


            $data = $this->ServicesProgramacion->extraccionDatosProgramacion($programaciones);

            return $data;


       
    }
}

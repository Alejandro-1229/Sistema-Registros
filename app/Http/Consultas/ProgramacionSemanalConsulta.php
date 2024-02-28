<?php

namespace App\Http\Consultas;

use App\Http\Services\ServicesProgramacionSemanal;
use App\Models\Expediente;
use App\Models\programacion_semanal;
use Carbon\Carbon;

class ProgramacionSemanalConsulta
{
    protected $ServicesProgramacionSemanal;

    public function __construct(ServicesProgramacionSemanal $ServicesProgramacionSemanal)
    {
        return $this->ServicesProgramacionSemanal = $ServicesProgramacionSemanal;
    }

    public function getAll()
    {
        $programacionSemanal = programacion_semanal::select('fechaInspeccion','local','direccion','ingeniero_1','ingeniero_2','realizado', 'aplazo_fecha')
        ->where('programacion_semanals.realizado','=','0')
        ->get();

        if ($programacionSemanal->isEmpty()) {
            $programacionSemanal = 'Por el momento no hay data';
        } 
        

        return $programacionSemanal;
    }

    public function getUltimoElemento()
    {
        $programacionSemanalUnitario = programacion_semanal::join('expedientes', 'programacion_semanals.idExpediente', '=', 'expedientes.idExpe')
            ->join('controls', 'expedientes.idControl', '=', 'controls.idCont')
            ->orderBy('programacion_semanals.idPrSe', 'desc')
            ->take(1)
            ->get();

        $data = $this->ServicesProgramacionSemanal->extraccionDatosProgSemanal($programacionSemanalUnitario);
        
        return $data;
    }



    
}

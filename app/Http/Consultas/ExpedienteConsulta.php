<?php

namespace App\Http\Consultas;

use App\Http\Services\ServicesExpediente;
use App\Models\Expediente;

class ExpedienteConsulta
{ 

    protected $ServicesExpediente;

    public function __construct(ServicesExpediente $ServicesExpediente)
    {
        return $this->ServicesExpediente = $ServicesExpediente;
    }

    private $perPage = 10;

    public function getAll()
    {
        $expedientes = Expediente::join('controls', 'expedientes.idControl', '=', 'controls.idCont')
            ->join('tipo__itses', 'controls.idTipoItse', '=', 'tipo__itses.idTiIt')
            ->join('nivel__riesgos', 'controls.idNivelRiesgo', '=', 'nivel__riesgos.idNiRi')
            ->join('estados','estados.idEsta','=','expedientes.idEstado')
            ->orderBy('idExpe','desc')
            ->paginate($this->perPage);

        $totalPages = $expedientes->lastPage(); 

        $dataExpediente  = $this->ServicesExpediente->extraccionDatosExpediente($expedientes);

        $data = [
            'Total Paginas' => $totalPages,
            'Datos' => $dataExpediente
        ];

        return $data;
    }


    public function create($request) 
    {
        $data = Expediente::create([
            'ruc' => $request->input('ruc'),
            'idControl' => $request->input('idControl'),
            'fechaIngresoMesaPartes' => $request->input('fechaIngresoMesaPartes'),
            'fechaIngresoSGDC' => $request->input('fechaIngresoSGDC'),
            'fechaRecepcionInspeccion' => $request->input('fechaRecepcionInspeccion'),
            'recepcionLicenciaFuncionamiento' => $request->input('recepcionLicenciaFuncionamiento'),
            'fechaLimiteInspeccion' => $request->input('fechaLimiteInspeccion'),
            'numeroInforme' => $request->input('numeroInforme'),
            'idEstado' => 1,
            'fecha' => $request->input('fecha'),
            'hora' => $request->input('hora'),
            'ILO' => $request->input('ILO')
        ]);


        return $data;
    }
}

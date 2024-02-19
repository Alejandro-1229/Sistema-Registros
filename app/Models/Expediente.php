<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Expediente extends Model
{
    use HasFactory;
 
    protected $primaryKey = 'idExpe';

    public function control():BelongsTo{
        return $this->belongsTo(control::class, 'idControl', 'idCont');
    }

    protected $fillable = [
        'ruc',
        'idControl',
        'fechaIngresoMesaPartes',
        'fechaIngresoSGDC',
        'fechaRecepcionInspeccion',
        'recepcionLicenciFuncionamiento',
        'fechaLimiteInspeccion',
        'numeroInforme',
        'estado',
        'fecha',
        'hora',
        'ILO'
    ];
}

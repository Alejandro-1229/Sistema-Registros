<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Expediente extends Model
{
    use HasFactory;

    protected $primaryKey = 'idExpe';

    public function control(): BelongsTo
    {
        return $this->belongsTo(control::class, 'idControl', 'idCont');
    }

    public function estado(): BelongsTo{
        return $this->belongsTo(Estado::class,'idEstado','idEsta');
    }

    public function prorgamacionSemanal(): HasMany
    {
        return $this->hasMany(programacion::class, 'idExpediente', 'idExpe');
    }

    protected $fillable = [
        'ruc',
        'idControl',
        'fechaIngresoMesaPartes',
        'fechaIngresoSGDC',
        'fechaRecepcionInspeccion',
        'recepcionLicenciaFuncionamiento',
        'fechaLimiteInspeccion',
        'numeroInforme',
        'idEstado',
        'fecha',
        'hora',
        'ILO',
    ];
}

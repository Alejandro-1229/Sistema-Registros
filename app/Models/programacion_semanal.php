<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class programacion_semanal extends Model
{
    use HasFactory;

    protected $primaryKey = 'idPrSe';

    public function expediente(): BelongsTo
    {
        return $this->belongsTo(control::class, 'idExpediente', 'idExpe');
    }

    public function estado(): BelongsTo{
        return $this->belongsTo(Estado::class,'idEstado','idEsta');
    }

    public function actualizacionFecha(): HasMany
    {
        return $this->hasMany(Actualizacion_fecha::class, 'idProgramacionSemanal', 'idPrSe');
    }

    protected $fillable = [
        'fechaInspeccion',
        'numeroExp',
        'funcs',
        'local',
        'direccion',
        'ingeniero_1',
        'ingeniero_2',
        'idEstado',
        'realizado',
        'idExpediente',
    ];
}

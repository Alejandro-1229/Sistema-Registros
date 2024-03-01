<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Actualizacion_fecha extends Model
{
    use HasFactory;

    protected $primaryKey = 'idAcFe';

    public function razon(): BelongsTo
    {
        return $this->belongsTo(razon::class, 'idRazon', '$idRazon');
    }
    public function programacionSemanal(): BelongsTo
    {
        return $this->belongsTo(programacion_semanal::class, 'idProgramacionSemanal', '$idPrSe');
    }

    protected $fillable = [
        'idProgramacionSemanal',
        'fechaAnterior',
        'fechaActualizada',
        'idRazon'
    ];
}

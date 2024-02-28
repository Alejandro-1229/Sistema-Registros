<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class programacion_semanal extends Model
{
    use HasFactory;

    protected $primaryKey = 'idPrSe';

    public function expediente():BelongsTo{
        return $this->belongsTo(control::class,'idExpediente','idExpe');
    }

    protected $fillable = [
        'fechaInspeccion',
        'local',
        'direccion',
        'ingeniero_1',
        'ingeniero_2',
        'realizado',
        'aplazo_fecha',
        'idExpediente',
    ];
}

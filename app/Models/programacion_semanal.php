<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class programacion_semanal extends Model
{
    use HasFactory;
    protected $pimeryKey = 'idPrSe';

    public function control():BelongsTo{
        return $this->belongsTo(control::class,'idControl','idCont');
    }

    protected $fillable = [
        'fechaInspeccion',
        'restoDias',
        'local',
        'direccion',
        'direccion_1',
        'direccion_2',
        'realizado',
        'aplazoFecha',
        'idControl',
    ];
}

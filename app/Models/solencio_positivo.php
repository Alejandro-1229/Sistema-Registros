<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class solencio_positivo extends Model
{
    use HasFactory;

    protected $pimeryKey = 'idSiPo';

    public function control():BelongsTo{
        return $this->belongsTo(control::class,'idControl','idCont');
    }

    protected $fillable = [
        'encargado',
        'local',
        'fechaEstablecida',
        'reestablecerFecha',
        'cancelar inspeccion',
        'idProgramacionSemanal',
    ];
}

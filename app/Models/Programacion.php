<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Programacion extends Model
{
    use HasFactory;

    protected $primaryKey = 'idProg';

    public function control(): BelongsTo
    {
        return $this->belongsTo(control::class, 'idControl', 'idCont');
    }

    protected $fillable = [
        'idControl',
        'firma',
        'fecha',
        'hora',
        'fechaDevolucion'
    ];
}

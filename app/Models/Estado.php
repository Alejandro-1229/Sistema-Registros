<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Estado extends Model
{
    use HasFactory;

    protected $primaryKey = 'idEsta';

    public function expediente(): HasMany{
        return $this->hasMany(Expediente::class,'idEstado','idEsta');
    }

    public function programacion_semanal(): HasMany{
        return $this->hasMany(programacion_semanal::class,'idEstado','idEsta');
    }

    protected $fillable = [
        'estado'
    ];
}

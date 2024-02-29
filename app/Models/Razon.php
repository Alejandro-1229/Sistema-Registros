<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Razon extends Model
{
    use HasFactory;

    protected $primaryKey = 'idRazon';

    public function actualizacionFecha():HasMany
    {
        return $this->hasMany(Actualizacion_fecha::class, 'idRazon', 'idRazon');
    }

    protected $fillable = [
        'razon',
    ];
}

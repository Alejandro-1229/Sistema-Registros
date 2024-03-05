<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Empleado extends Model
{
    use HasFactory;

    protected $primaryKey = 'idEmpl';

    public function usuario(): HasMany
    {
        return $this->hasMany(usuario::class,'idEmpleado','idEmpl');
    }

    protected $fillable = [
        'nombres',
        'apellidos',
        'numeroContacto'
    ];
}

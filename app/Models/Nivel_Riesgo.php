<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Nivel_Riesgo extends Model
{
    use HasFactory;  

    protected $primaryKey = 'idNiRi';
    
    public function control():HasMany{
        return $this->hasMany(control::class, 'idNivelRiesgo', 'idNiRi');
    }

    protected $fillable = [
        'nivel_riesgo'
    ];
}

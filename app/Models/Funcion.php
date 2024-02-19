<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Funcion extends Model
{
    use HasFactory;  

    protected $primaryKey = 'idFunc';
    
    public function control():HasMany{
        return $this->hasMany(control::class, 'idFuncion','idFunc');
    }

    protected $fillable = [
        'descripcion'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Solicitud extends Model
{
    use HasFactory; 
 
    protected $primaryKey = 'idEsSo';

    public function control():HasMany{
        return $this->hasMany(control::class, 'idSolicitud','idEsSo');
    }

    protected $fillable = [
        'solicitud'
    ];
} 

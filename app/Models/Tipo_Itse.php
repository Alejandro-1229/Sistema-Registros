<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tipo_Itse extends Model
{ 
    use HasFactory;  

    protected $primaryKey = 'idTiIt';
    
    public function control():HasMany{
        return $this->hasMany(control::class, ' idTipoItse', 'idTiIt');
    }

    protected $fillable = [
        'tipo_itse'
    ];
}

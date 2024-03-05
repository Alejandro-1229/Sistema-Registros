<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TipoUsuario extends Model
{
    use HasFactory;

    protected $primaryKey = 'idTiUs';

    public function usuario():HasMany
    {
        return $this->hasMany(Usuario::class,'idTipoUsuario','idTiUs');
    }

    protected $fillable = [
        'tipoUsuario'
    ];
}

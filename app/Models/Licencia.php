<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Licencia extends Model
{
    use HasFactory; 

    protected $rimaryKey = 'idLice';

    public function control():HasMany{
        return $this->hasMany(control::class, 'idLicencia','idLice');
    }

    protected $fillable = [
        'activo'
    ];
}

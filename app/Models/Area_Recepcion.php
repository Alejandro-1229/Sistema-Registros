<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Area_Recepcion extends Model
{
    use HasFactory;

    protected $primarykey = 'idArRe';

    public function control(): HasMany
    {
        return $this->hasMany(control::class, 'idAreaRecepcion', 'idArRe');
    }

    protected $fillable = [
        'area'
    ];
}

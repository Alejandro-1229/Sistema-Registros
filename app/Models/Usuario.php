<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Usuario extends User
{
    use HasFactory;

    use HasApiTokens, HasFactory, Notifiable;

    protected $primaryKey = 'idUsua';

    protected $table = 'usuarios';

    public function empleado(): BelongsTo
    {
        return $this->belongsTo(Empleado::class, 'idEmpleado', 'idEmpl');
    }
    public function tipoUsuario(): BelongsTo
    {
        return $this->belongsTo(TipoUsuario::class, 'idTipoUsuario', 'idTiUs');
    }

    protected $fillable = [
        'codUsuario',
        'password',
        'idEmpleado',
        'idTipoUsuario'
    ];
}

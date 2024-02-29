<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class control extends Model
{
    use HasFactory;

    protected $primaryKey = 'idCont';

    public function tipoItse(): BelongsTo
    {
        return $this->belongsTo(Tipo_Itse::class, 'idTipoItse', 'idTiIt');
    }
    public function funcion(): BelongsTo
    {
        return $this->belongsTo(funcion::class, 'idFuncion', 'idFunc');
    }
    public function nivelRiesgo(): BelongsTo
    {
        return $this->belongsTo(Nivel_Riesgo::class, 'idNivelRiesgo', 'idNiRi');
    }
    public function solicitud(): BelongsTo
    {
        return $this->belongsTo(solicitud::class, 'idSolicitud', 'idEsSo');
    }
    public function licencia(): BelongsTo
    {
        return $this->belongsTo(licencia::class, 'idLicencia', 'idLice');
    }
    public function areaRecepcion(): BelongsTo
    {
        return $this->belongsTo(Area_Recepcion::class, 'idAreaRecepcion', 'idArRe');
    }
    public function expediente(): HasMany
    {
        return $this->hasMany(expediente::class, 'idControl', 'idCont');
    }
    public function programacion(): HasMany
    {
        return $this->hasMany(programacion::class, 'idControl', 'idCont');
    }


    protected $fillable = [
        'numeroExpediente',
        'idTipoItse',
        'idFuncion',
        'idNivelRiesgo',
        'razonSocial',
        'nombreEstablecimiento',
        'giroDelNegocio',
        'datosSolicitante',
        'fechaIngreso',
        'fechaIngresoSGDC',
        'barrio',
        'nombreHabilitacionUrbana',
        'areaOcupada',
        'numeroPisos',
        'manzana',
        'lote',
        'tipoVia',
        'nombreVia',
        'numeroMunicipal',
        'idLicencia',
        'idSolicitud',
        'fechaResolucion',
        'numeroResolucion',
        'numeroCertificado',
        'vigenciaCertificado',
        'inspector_1',
        'inspector_2',
        'fechaInspeccion_1',
        'fechaInspeccion_2',
        'fechaInspeccion_3',
        'fechaInspeccionIlo',
        'fechaDevolucion_1',
        'fechaDevolucion_2',
        'numeroObservaciones',
        'idAreaRecepcion',
        'pagoDerechoInspeccion'
    ];
}

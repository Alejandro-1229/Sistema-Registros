<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ControlRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'numeroExpediente' => 'required|string|max:10',
            'idTipoItse' => 'required',
            'idFuncion' => 'required',
            'idNivelRiesgo' => 'required',
            'razonSocial' => 'required|string|max:100',
            'nombreEstablecimiento' => 'nullable|max:100',
            'giroDelNegocio' => 'required|string|max:150',
            'datosSolicitante' => 'required|string|max:500',
            'fechaIngreso' => 'required|date',
            'fechaIngresoSGDC' => 'required|date',
            'barrio' => 'nullable|string|max:10',
            'nombreHabilitacionUrbana' => 'required|string|max:100',
            'areaOcupada' => 'required|string|max:15',
            'numeroPisos' => 'required|string|max:10',
            'manzana' => 'nullable|string|max:10',
            'lote' => 'nullable|string|max:10',
            'tipoVia' => 'nullable|string|max:20',
            'nombreVia' => 'nullable|string|max:40',
            'numeroMunicipal' => 'nullable|string|max:50',
            'idLicencia' => 'nullable|integer',
            'idSolicitud' => 'nullable|integer',
            'fechaResolucion' => 'nullable|date',
            'numeroResolucion' => 'nullable|string|max:20',
            'numeroCertificado' => 'nullable|max:20',
            'vigenciaCertificado' => 'nullable|date',
            'inspector_1' => 'nullable|string|max:150',
            'inspector_2' => 'nullable|string|max:400',
            'fechaInspeccion_1' => 'nullable|date',
            'fechaInspeccion_2' => 'nullable|date',
            'fechaInspeccion_3' => 'nullable|date',
            'fechaInspeccionIlo' => 'nullable|date',
            'fechaDevolucion_1' => 'nullable|date',
            'fechaDevolucion_2' => 'nullable|date',
            'numeroObservaciones' => 'nullable|string|max:50',
            'idAreaRecepcion' => 'nullable|integer',
            'pagoDerechoInspeccion' => 'nullable|numeric'
        ];
    }
}

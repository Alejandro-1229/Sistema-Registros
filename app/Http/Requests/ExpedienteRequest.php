<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExpedienteRequest extends FormRequest
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
            'ruc' => 'nullable|string|max:15',
            'idControl' => 'required|integer|exists:controls,idCont',
            'fechaIngresoMesaPartes' => 'nullable|date',
            'fechaIngresoSGDC' => 'nullable|date',
            'fechaRecepcionInspeccion' => 'nullable|date',
            'recepcionLicenciaFuncionamiento' => 'nullable|date',
            'fechaLimiteInspeccion' => 'nullable|date',
            'numeroInforme' => 'nullable|max:10',
            'idEstado' => 'integer',
            'fecha' => 'nullable|date',
            'hora' => 'nullable',
            'ILO' => 'nullable|date'
        ];
        

        
    }
}

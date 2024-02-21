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
            //
            'ruc' => 'required|string|max:15',
            'idControl' => 'required|integer|exists:controls,idCont',
            'fechaIngresoMesaPartes' => 'required|date',
            'fechaIngresoSGDC' => 'required|date',
            'fechaRecepcionInspeccion' => 'required|date',
            'recepcionLicenciaFuncionamiento' => 'required|date',
            'fechaLimiteInspeccion' => 'required|date',
            'numeroInforme' => 'nullable|max:10',
            'estado' => 'nullable',
            'fecha' => 'nullable|date',
            'hora' => 'nullable',
            'ILO' => 'nullable|date'
        ];
        

        
    }
}

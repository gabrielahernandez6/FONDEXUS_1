<?php

namespace App\Http\Requests\Juridica;

use Illuminate\Foundation\Http\FormRequest;

class ProcesoJuridicoStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->can('create', \App\Models\Juridica\ProcesoJuridico::class) ?? false;
    }

    public function rules(): array
    {
        return [
            'radicado' => ['required', 'string', 'max:255', 'unique:procesos_juridicos,radicado'],
            'titulo' => ['required', 'string', 'max:255'],
            'descripcion' => ['nullable', 'string'],
            'estado' => ['required', 'string', 'max:255'],
            'fecha_inicio' => ['nullable', 'date'],
            'fecha_fin' => ['nullable', 'date', 'after_or_equal:fecha_inicio'],
            'entidad' => ['nullable', 'string', 'max:255'],
            'responsable_user_id' => ['nullable', 'integer', 'exists:users,id'],
            'documento_path' => ['nullable', 'string', 'max:1024'],
            'documento_nombre' => ['nullable', 'string', 'max:255'],
            'documento_mime' => ['nullable', 'string', 'max:255'],
            'documento_size' => ['nullable', 'integer', 'min:0'],
            'metadata' => ['nullable', 'array'],
        ];
    }
}

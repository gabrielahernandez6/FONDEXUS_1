<?php

namespace App\Http\Requests\Juridica;

use Illuminate\Foundation\Http\FormRequest;

class ProcesoJuridicoUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        $proceso = $this->route('proceso_juridico');

        return $proceso !== null && $this->user()?->can('update', $proceso) === true;
    }

    public function rules(): array
    {
        $proceso = $this->route('proceso_juridico');
        $id = is_object($proceso) ? $proceso->id : null;

        return [
            'radicado' => ['sometimes', 'required', 'string', 'max:255', 'unique:procesos_juridicos,radicado,'.((string) $id)],
            'titulo' => ['sometimes', 'required', 'string', 'max:255'],
            'descripcion' => ['sometimes', 'nullable', 'string'],
            'estado' => ['sometimes', 'required', 'string', 'max:255'],
            'fecha_inicio' => ['sometimes', 'nullable', 'date'],
            'fecha_fin' => ['sometimes', 'nullable', 'date', 'after_or_equal:fecha_inicio'],
            'entidad' => ['sometimes', 'nullable', 'string', 'max:255'],
            'responsable_user_id' => ['sometimes', 'nullable', 'integer', 'exists:users,id'],
            'documento_path' => ['sometimes', 'nullable', 'string', 'max:1024'],
            'documento_nombre' => ['sometimes', 'nullable', 'string', 'max:255'],
            'documento_mime' => ['sometimes', 'nullable', 'string', 'max:255'],
            'documento_size' => ['sometimes', 'nullable', 'integer', 'min:0'],
            'metadata' => ['sometimes', 'nullable', 'array'],
        ];
    }
}

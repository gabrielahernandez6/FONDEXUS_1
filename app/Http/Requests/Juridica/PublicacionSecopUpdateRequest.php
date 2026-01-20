<?php

namespace App\Http\Requests\Juridica;

use Illuminate\Foundation\Http\FormRequest;

class PublicacionSecopUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        $publicacion = $this->route('publicacion_secop');

        return $publicacion !== null && $this->user()?->can('update', $publicacion) === true;
    }

    public function rules(): array
    {
        $publicacion = $this->route('publicacion_secop');
        $id = is_object($publicacion) ? $publicacion->id : null;

        return [
            'proceso_juridico_id' => ['sometimes', 'nullable', 'integer', 'exists:procesos_juridicos,id'],
            'secop_id' => ['sometimes', 'required', 'string', 'max:255', 'unique:publicaciones_secop,secop_id,'.((string) $id)],
            'fuente' => ['sometimes', 'nullable', 'string', 'max:255'],
            'titulo' => ['sometimes', 'required', 'string', 'max:255'],
            'url' => ['sometimes', 'required', 'string', 'max:2048'],
            'fecha_publicacion' => ['sometimes', 'nullable', 'date'],
            'valor' => ['sometimes', 'nullable', 'numeric', 'min:0'],
            'entidad' => ['sometimes', 'nullable', 'string', 'max:255'],
            'estado' => ['sometimes', 'nullable', 'string', 'max:255'],
            'payload' => ['sometimes', 'nullable', 'array'],
        ];
    }
}

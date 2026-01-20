<?php

namespace App\Http\Requests\Juridica;

use Illuminate\Foundation\Http\FormRequest;

class PublicacionSecopStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->can('create', \App\Models\Juridica\PublicacionSecop::class) ?? false;
    }

    public function rules(): array
    {
        return [
            'proceso_juridico_id' => ['nullable', 'integer', 'exists:procesos_juridicos,id'],
            'secop_id' => ['required', 'string', 'max:255', 'unique:publicaciones_secop,secop_id'],
            'fuente' => ['nullable', 'string', 'max:255'],
            'titulo' => ['required', 'string', 'max:255'],
            'url' => ['required', 'string', 'max:2048'],
            'fecha_publicacion' => ['nullable', 'date'],
            'valor' => ['nullable', 'numeric', 'min:0'],
            'entidad' => ['nullable', 'string', 'max:255'],
            'estado' => ['nullable', 'string', 'max:255'],
            'payload' => ['nullable', 'array'],
        ];
    }
}

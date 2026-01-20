<?php

namespace App\Http\Requests\Juridica;

use Illuminate\Foundation\Http\FormRequest;

class LeyVigenteStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->can('create', \App\Models\Juridica\LeyVigente::class) ?? false;
    }

    public function rules(): array
    {
        return [
            'codigo' => ['required', 'string', 'max:255', 'unique:leyes_vigentes,codigo'],
            'titulo' => ['required', 'string', 'max:255'],
            'descripcion' => ['nullable', 'string'],
            'fecha_publicacion' => ['nullable', 'date'],
            'url' => ['nullable', 'string', 'max:2048'],
            'estado' => ['required', 'string', 'max:255'],
            'tags' => ['nullable', 'array'],
        ];
    }
}

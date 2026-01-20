<?php

namespace App\Http\Requests\Juridica;

use Illuminate\Foundation\Http\FormRequest;

class LeyVigenteUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        $ley = $this->route('ley_vigente');

        return $ley !== null && $this->user()?->can('update', $ley) === true;
    }

    public function rules(): array
    {
        $ley = $this->route('ley_vigente');
        $id = is_object($ley) ? $ley->id : null;

        return [
            'codigo' => ['sometimes', 'required', 'string', 'max:255', 'unique:leyes_vigentes,codigo,'.((string) $id)],
            'titulo' => ['sometimes', 'required', 'string', 'max:255'],
            'descripcion' => ['sometimes', 'nullable', 'string'],
            'fecha_publicacion' => ['sometimes', 'nullable', 'date'],
            'url' => ['sometimes', 'nullable', 'string', 'max:2048'],
            'estado' => ['sometimes', 'required', 'string', 'max:255'],
            'tags' => ['sometimes', 'nullable', 'array'],
        ];
    }
}

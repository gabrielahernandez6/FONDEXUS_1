<?php

namespace App\Http\Requests\Juridica;

use App\Models\Juridica\ProcesoJuridico;
use Illuminate\Foundation\Http\FormRequest;

class ProcesoJuridicoDocumentoStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        /** @var ProcesoJuridico|null $proceso */
        $proceso = $this->route('proceso_juridico');

        return $proceso !== null && $this->user() !== null && $this->user()->can('update', $proceso);
    }

    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'documento' => ['required', 'file', 'max:20480', 'mimetypes:application/pdf'],
        ];
    }
}

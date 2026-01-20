<?php

namespace App\Http\Resources\Juridica;

use App\Models\Juridica\LeyVigente;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin LeyVigente
 */
class LeyVigenteResource extends JsonResource
{
    /**
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'codigo' => $this->codigo,
            'titulo' => $this->titulo,
            'descripcion' => $this->descripcion,
            'fecha_publicacion' => $this->fecha_publicacion,
            'url' => $this->url,
            'estado' => $this->estado,
            'tags' => $this->tags,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}

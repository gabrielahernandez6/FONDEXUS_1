<?php

namespace App\Http\Resources\Juridica;

use App\Models\Juridica\PublicacionSecop;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin PublicacionSecop
 */
class PublicacionSecopResource extends JsonResource
{
    /**
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'proceso_juridico_id' => $this->proceso_juridico_id,
            'secop_id' => $this->secop_id,
            'fuente' => $this->fuente,
            'titulo' => $this->titulo,
            'url' => $this->url,
            'fecha_publicacion' => $this->fecha_publicacion,
            'valor' => $this->valor,
            'entidad' => $this->entidad,
            'estado' => $this->estado,
            'payload' => $this->payload,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'proceso_juridico' => $this->whenLoaded('procesoJuridico', fn (): array|null => $this->procesoJuridico ? [
                'id' => $this->procesoJuridico->id,
                'radicado' => $this->procesoJuridico->radicado,
                'titulo' => $this->procesoJuridico->titulo,
            ] : null),
        ];
    }
}

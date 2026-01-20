<?php

namespace App\Http\Resources\Juridica;

use App\Models\Juridica\ProcesoJuridico;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin ProcesoJuridico
 */
class ProcesoJuridicoResource extends JsonResource
{
    /**
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'radicado' => $this->radicado,
            'titulo' => $this->titulo,
            'descripcion' => $this->descripcion,
            'estado' => $this->estado,
            'fecha_inicio' => $this->fecha_inicio,
            'fecha_fin' => $this->fecha_fin,
            'entidad' => $this->entidad,
            'responsable_user_id' => $this->responsable_user_id,
            'documento_path' => $this->documento_path,
            'documento_nombre' => $this->documento_nombre,
            'documento_mime' => $this->documento_mime,
            'documento_size' => $this->documento_size,
            'metadata' => $this->metadata,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'responsable' => $this->whenLoaded('responsable', fn (): array|null => $this->responsable ? [
                'id' => $this->responsable->id,
                'name' => $this->responsable->name,
                'email' => $this->responsable->email,
            ] : null),
            'publicaciones_secop' => PublicacionSecopResource::collection($this->whenLoaded('publicacionesSecop')),
        ];
    }
}

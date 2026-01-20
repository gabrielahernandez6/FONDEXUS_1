<?php

namespace App\Http\Resources\Dashboard;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property array{data: \Illuminate\Support\Collection<int, \App\Models\ActivityLog>} $resource
 */
class RecentChangesResource extends JsonResource
{
    /**
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'data' => ActivityLogResource::collection($this->resource['data']),
        ];
    }
}

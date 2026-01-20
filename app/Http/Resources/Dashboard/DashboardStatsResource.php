<?php

namespace App\Http\Resources\Dashboard;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property array{users: array{by_role: array<int, array{id:int|null,name:string|null,total:int}>, by_area: array<int, array{id:int|null,name:string|null,total:int}>}} $resource
 */
class DashboardStatsResource extends JsonResource
{
    /**
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'data' => $this->resource,
        ];
    }
}

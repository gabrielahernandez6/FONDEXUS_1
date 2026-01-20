<?php

namespace App\Http\Resources\Dashboard;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property array{modules: array{users: array{total:int}, roles: array{total:int}, areas: array{total:int}}} $resource
 */
class DashboardSummaryResource extends JsonResource
{
    /**
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'data' => [
                'modules' => $this->resource['modules'],
            ],
        ];
    }
}

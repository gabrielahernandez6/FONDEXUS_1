<?php

namespace App\Http\Resources\Dashboard;

use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin ActivityLog
 */
class ActivityLogResource extends JsonResource
{
    /**
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'type' => $this->subject_type,
            'subject_id' => $this->subject_id,
            'event' => $this->event,
            'occurred_at' => $this->occurred_at,
            'causer' => $this->whenLoaded('causer', fn (): array|null => $this->causer ? [
                'id' => $this->causer->id,
                'name' => $this->causer->name,
                'email' => $this->causer->email,
            ] : null),
            'properties' => $this->properties,
        ];
    }
}

<?php

namespace App\Models\Concerns;

use App\Models\ActivityLog;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

trait LogsActivity
{
    public static function bootLogsActivity(): void
    {
        static::created(function (Model $model): void {
            self::logActivity(model: $model, event: 'created');
        });

        static::updated(function (Model $model): void {
            self::logActivity(model: $model, event: 'updated');
        });

        static::deleted(function (Model $model): void {
            self::logActivity(model: $model, event: 'deleted');
        });
    }

    protected static function logActivity(Model $model, string $event): void
    {
        ActivityLog::query()->create([
            'subject_type' => $model->getMorphClass(),
            'subject_id' => $model->getKey(),
            'event' => $event,
            'causer_id' => Auth::id(),
            'properties' => [
                'attributes' => $event === 'updated' ? $model->getChanges() : $model->getAttributes(),
            ],
            'occurred_at' => now(),
        ]);
    }
}

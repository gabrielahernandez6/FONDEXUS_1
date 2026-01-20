<?php

namespace App\Services;

use App\Models\ActivityLog;
use App\Models\Area;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Collection;

class DashboardService
{
    /**
     * @return array{modules: array{users: array{total:int}, roles: array{total:int}, areas: array{total:int}}}
     */
    public function summary(): array
    {
        return [
            'modules' => [
                'users' => ['total' => User::query()->count()],
                'roles' => ['total' => Role::query()->count()],
                'areas' => ['total' => Area::query()->count()],
            ],
        ];
    }

    /**
     * @return Collection<int, ActivityLog>
     */
    public function recentChanges(int $limit = 10): Collection
    {
        $limit = max(1, min($limit, 50));

        return ActivityLog::query()
            ->with(['causer', 'subject'])
            ->orderByDesc('occurred_at')
            ->limit($limit)
            ->get();
    }

    /**
     * @return array{users: array{by_role: array<int, array{id:int|null,name:string|null,total:int}>, by_area: array<int, array{id:int|null,name:string|null,total:int}>}}
     */
    public function stats(): array
    {
        $roles = Role::query()
            ->select(['id', 'name'])
            ->withCount('users')
            ->orderByDesc('users_count')
            ->get()
            ->map(fn (Role $role): array => [
                'id' => $role->id,
                'name' => $role->name,
                'total' => $role->users_count,
            ])
            ->all();

        $areas = Area::query()
            ->select(['id', 'name'])
            ->withCount('users')
            ->orderByDesc('users_count')
            ->get()
            ->map(fn (Area $area): array => [
                'id' => $area->id,
                'name' => $area->name,
                'total' => $area->users_count,
            ])
            ->all();

        return [
            'users' => [
                'by_role' => $roles,
                'by_area' => $areas,
            ],
        ];
    }
}

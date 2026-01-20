<?php

use App\Models\Area;
use App\Models\Role;
use App\Models\User;

it('requires authentication for dashboard endpoints', function () {
    $this->getJson('/api/dashboard/summary')->assertStatus(401);
    $this->getJson('/api/dashboard/recent-changes')->assertStatus(401);
    $this->getJson('/api/dashboard/stats')->assertStatus(401);
});

it('returns a dashboard summary', function () {
    $this->actingAs(User::factory()->create());

    Role::factory()->count(2)->create();
    Area::factory()->count(3)->create();
    User::factory()->count(4)->create();

    $this->getJson('/api/dashboard/summary')
        ->assertOk()
        ->assertJsonStructure([
            'data' => [
                'modules' => [
                    'users' => ['total'],
                    'roles' => ['total'],
                    'areas' => ['total'],
                ],
            ],
        ]);
});

it('returns recent changes from activity logs', function () {
    $actor = User::factory()->create();
    $this->actingAs($actor);

    Role::factory()->create();
    Area::factory()->create();

    $this->getJson('/api/dashboard/recent-changes?limit=5')
        ->assertOk()
        ->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'type',
                    'subject_id',
                    'event',
                    'occurred_at',
                    'causer',
                    'properties',
                ],
            ],
        ]);
});

it('returns dashboard stats', function () {
    $this->actingAs(User::factory()->create());

    $roleA = Role::factory()->create();
    $roleB = Role::factory()->create();

    $areaA = Area::factory()->create();
    $areaB = Area::factory()->create();

    User::factory()->count(2)->create(['role_id' => $roleA->id, 'area_id' => $areaA->id]);
    User::factory()->count(1)->create(['role_id' => $roleA->id, 'area_id' => $areaB->id]);
    User::factory()->count(3)->create(['role_id' => $roleB->id, 'area_id' => $areaB->id]);

    $this->getJson('/api/dashboard/stats')
        ->assertOk()
        ->assertJsonStructure([
            'data' => [
                'users' => [
                    'by_role' => [
                        '*' => ['id', 'name', 'total'],
                    ],
                    'by_area' => [
                        '*' => ['id', 'name', 'total'],
                    ],
                ],
            ],
        ]);
});

<?php

use App\Models\Area;
use App\Models\Role;
use App\Models\User;

function createRole(string $slug): Role
{
    return Role::factory()->create([
        'slug' => $slug,
        'name' => ucfirst($slug),
    ]);
}

function createArea(string $slug): Area
{
    return Area::factory()->create([
        'slug' => $slug,
        'name' => ucfirst($slug),
    ]);
}

test('juridica endpoints require authentication', function () {
    $this->getJson('/api/juridica/procesos')->assertStatus(401);
    $this->getJson('/api/juridica/publicaciones-secop')->assertStatus(401);
    $this->getJson('/api/juridica/leyes-vigentes')->assertStatus(401);
});

test('non legal area user is forbidden from juridica module', function () {
    $roleUser = createRole('user');
    $areaFinancial = createArea('financial');

    $user = User::factory()->create([
        'role_id' => $roleUser->id,
        'area_id' => $areaFinancial->id,
    ]);

    $this->actingAs($user);

    $this->getJson('/api/juridica/procesos')->assertStatus(403);
});

test('legal area user can read juridica but can not create procesos', function () {
    $roleUser = createRole('user');
    $areaLegal = createArea('legal');

    $user = User::factory()->create([
        'role_id' => $roleUser->id,
        'area_id' => $areaLegal->id,
    ]);

    $this->actingAs($user);

    $this->getJson('/api/juridica/procesos')->assertOk();

    $this->postJson('/api/juridica/procesos', [
        'radicado' => 'PJ-100001',
        'titulo' => 'Proceso de prueba',
        'estado' => 'abierto',
    ])->assertStatus(403);
});

test('legal coordinator can create procesos', function () {
    $roleCoordinator = createRole('coordinator');
    $areaLegal = createArea('legal');

    $user = User::factory()->create([
        'role_id' => $roleCoordinator->id,
        'area_id' => $areaLegal->id,
    ]);

    $this->actingAs($user);

    $this->postJson('/api/juridica/procesos', [
        'radicado' => 'PJ-100002',
        'titulo' => 'Proceso coordinador',
        'estado' => 'abierto',
    ])->assertCreated();
});

test('admin can access juridica even if not in legal area', function () {
    $roleAdmin = createRole('admin');
    $areaTech = createArea('tech');

    $user = User::factory()->create([
        'role_id' => $roleAdmin->id,
        'area_id' => $areaTech->id,
    ]);

    $this->actingAs($user);

    $this->getJson('/api/juridica/leyes-vigentes')->assertOk();
});

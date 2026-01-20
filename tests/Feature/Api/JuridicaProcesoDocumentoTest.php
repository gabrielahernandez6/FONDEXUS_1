<?php

use App\Models\Area;
use App\Models\Juridica\ProcesoJuridico;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Http;

function juridicaRole(string $slug): Role
{
    return Role::factory()->create([
        'slug' => $slug,
        'name' => ucfirst($slug),
    ]);
}

function juridicaArea(string $slug): Area
{
    return Area::factory()->create([
        'slug' => $slug,
        'name' => ucfirst($slug),
    ]);
}

test('coordinator legal can upload documento to proceso and request signed url', function () {
    config()->set('services.supabase.url', 'https://example.supabase.co');
    config()->set('services.supabase.service_role_key', 'service-role-key');
    config()->set('services.supabase.storage_bucket', 'FONDEXUS_BUCKET');

    $roleCoordinator = juridicaRole('coordinator');
    $areaLegal = juridicaArea('legal');

    $user = User::factory()->create([
        'role_id' => $roleCoordinator->id,
        'area_id' => $areaLegal->id,
    ]);

    $proceso = ProcesoJuridico::factory()->create([
        'responsable_user_id' => $user->id,
    ]);

    Http::fake([
        'https://example.supabase.co/storage/v1/object/FONDEXUS_BUCKET/*' => Http::response(['ok' => true], 200),
        'https://example.supabase.co/storage/v1/object/sign/FONDEXUS_BUCKET/*' => Http::response(['signedURL' => '/storage/v1/object/sign/FONDEXUS_BUCKET/foo?token=abc'], 200),
    ]);

    $this->actingAs($user);

    $file = UploadedFile::fake()->create('doc.pdf', 10, 'application/pdf');

    $this->postJson('/api/juridica/procesos/'.$proceso->id.'/documento', [
        'documento' => $file,
    ])->assertOk();

    $proceso->refresh();

    expect($proceso->documento_path)->not()->toBeNull();

    $this->getJson('/api/juridica/procesos/'.$proceso->id.'/documento/signed-url')
        ->assertOk()
        ->assertJsonStructure([
            'signed_url',
            'expires_in',
        ]);
});

test('user legal can not upload documento', function () {
    config()->set('services.supabase.url', 'https://example.supabase.co');
    config()->set('services.supabase.service_role_key', 'service-role-key');
    config()->set('services.supabase.storage_bucket', 'FONDEXUS_BUCKET');

    $roleUser = juridicaRole('user');
    $areaLegal = juridicaArea('legal');

    $user = User::factory()->create([
        'role_id' => $roleUser->id,
        'area_id' => $areaLegal->id,
    ]);

    $proceso = ProcesoJuridico::factory()->create();

    Http::fake();

    $this->actingAs($user);

    $file = UploadedFile::fake()->create('doc.pdf', 10, 'application/pdf');

    $this->postJson('/api/juridica/procesos/'.$proceso->id.'/documento', [
        'documento' => $file,
    ])->assertStatus(403);
});

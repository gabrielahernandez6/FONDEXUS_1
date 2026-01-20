<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
                'name' => 'Administrador',
                'slug' => 'admin',
                'description' => 'Acceso total al sistema',
            ],
            [
                'name' => 'Coordinador',
                'slug' => 'coordinator',
                'description' => 'Gestión de áreas específicas',
            ],
            [
                'name' => 'Usuario',
                'slug' => 'user',
                'description' => 'Usuario estándar del sistema',
            ],
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
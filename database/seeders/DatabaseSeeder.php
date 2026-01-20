<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            AreaSeeder::class,
        ]);

        $adminRole = \App\Models\Role::where('slug', 'admin')->first();
        $techArea = \App\Models\Area::where('slug', 'tech')->first();

        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@fondexus.com',
            'role_id' => $adminRole?->id,
            'area_id' => $techArea?->id,
        ]);
    }
}

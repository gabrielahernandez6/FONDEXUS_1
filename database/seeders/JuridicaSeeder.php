<?php

namespace Database\Seeders;

use App\Models\Juridica\LeyVigente;
use App\Models\Juridica\ProcesoJuridico;
use App\Models\Juridica\PublicacionSecop;
use Illuminate\Database\Seeder;

class JuridicaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProcesoJuridico::factory()
            ->count(10)
            ->has(PublicacionSecop::factory()->count(2), 'publicacionesSecop')
            ->create();

        LeyVigente::factory()->count(10)->create();
    }
}

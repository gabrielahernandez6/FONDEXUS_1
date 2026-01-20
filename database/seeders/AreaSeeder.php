<?php

namespace Database\Seeders;

use App\Models\Area;
use Illuminate\Database\Seeder;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $areas = [
            [
                'name' => 'Jurídica',
                'slug' => 'legal',
                'description' => 'Departamento legal',
            ],
            [
                'name' => 'Financiera',
                'slug' => 'financial',
                'description' => 'Departamento financiero y contable',
            ],
            [
                'name' => 'Planeación',
                'slug' => 'planning',
                'description' => 'Departamento de planeación estratégica',
            ],
            [
                'name' => 'RRHH y CI',
                'slug' => 'human-resources',
                'description' => 'Departamento de recursos humanos y control interno',
            ],
            [
                'name' => 'Gestión Documental',
                'slug' => 'document-management',
                'description' => 'Departamento de gestión documental',
            ],
            [
                'name' => 'Recepción',
                'slug' => 'reception',
                'description' => 'Departamento de recepción',
            ],
        ];

        foreach ($areas as $area) {
            Area::create($area);
        }
    }
}
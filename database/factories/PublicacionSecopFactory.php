<?php

namespace Database\Factories;

use App\Models\Juridica\ProcesoJuridico;
use App\Models\Juridica\PublicacionSecop;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Juridica\PublicacionSecop>
 */
class PublicacionSecopFactory extends Factory
{
    protected $model = PublicacionSecop::class;

    public function definition(): array
    {
        return [
            'proceso_juridico_id' => ProcesoJuridico::factory(),
            'secop_id' => 'SECOP-'.fake()->unique()->numberBetween(100000, 999999),
            'fuente' => fake()->optional()->randomElement(['SECOP I', 'SECOP II']),
            'titulo' => fake()->sentence(8),
            'url' => fake()->url(),
            'fecha_publicacion' => fake()->optional()->date(),
            'valor' => fake()->optional()->randomFloat(2, 100000, 20000000),
            'entidad' => fake()->optional()->company(),
            'estado' => fake()->optional()->randomElement(['publicado', 'en_revision', 'cerrado']),
            'payload' => [
                'source' => 'factory',
            ],
        ];
    }
}

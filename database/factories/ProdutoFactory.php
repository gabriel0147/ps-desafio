<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produto>
 */
class ProdutoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nome' => $this->faker->name(),
            'descricao' => $this->faker->text(100),
            'preco' => $this->faker->randomFloat(2, 0, 30),
            'quantidade' => $this->faker->numberBetween(1, 10),
            'imagem' => '/storage/produtos/' . $this->faker->image(Storage::path('public/produtos'), 360, 360, null, false),
            // 'imagem' => $this->faker->imageUrl(640, 480),
            'categoria_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}

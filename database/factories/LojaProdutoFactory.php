<?php

namespace Database\Factories;

use App\Models\Loja;
use Illuminate\Database\Eloquent\Factories\Factory;

class LojaProdutoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome' => $this->faker->word(),
            'valor' => rand(100, 99999),
            'loja_id' => Loja::inRandomOrder()->first()->id,
            'ativo' => rand(0,1)
        ];
    }
}

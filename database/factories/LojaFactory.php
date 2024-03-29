<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class LojaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome' => $this->faker->company(),
            'email' => $this->faker->unique()->email()
        ];
    }
}

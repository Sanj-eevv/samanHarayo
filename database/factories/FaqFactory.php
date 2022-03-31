<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FaqFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'answer'       =>          $this->faker->paragraph(rand(5,10), $variableNbSentences = true),
            'question'      =>          $this->faker->sentence(rand(5,10), true)
        ];
    }
}

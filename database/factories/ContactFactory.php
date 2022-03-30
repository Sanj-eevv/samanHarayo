<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'          =>          $this->faker->name(),
            'email'         =>          $this->faker->safeEmail(),
            'message'       =>          $this->faker->paragraph(rand(5,10), $variableNbSentences = true),
            'question'      =>          $this->faker->sentence(rand(5,10), true)
        ];
    }
}

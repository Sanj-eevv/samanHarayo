<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ItemImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'claim'             =>              0,
            'created_at'        =>              now(),
            'updated_at'        =>              now(),
        ];
    }
}

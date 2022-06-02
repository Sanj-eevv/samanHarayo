<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => 'superAdmin',
            'label' => 'SuperAdmin',
            'description' => 'Test user with no limit',
            'preserved' => 'yes'
        ];
    }
}
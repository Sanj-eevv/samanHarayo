<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'total'                 =>              $this->faker->randomFloat(2, 100, 20),
            'transaction_id'        =>              $this->faker->iban(),
            'created_at'            =>              now(),
            'updated_at'            =>              now(),
        ];
    }
}

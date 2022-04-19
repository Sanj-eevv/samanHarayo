<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ReportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'                 =>                'Samsung S22 6gb Ram',
            'description'           =>                 'Description test',
            'brand'                 =>                 'Samsung',
            'contact_number'        =>                 9812380822,
            'contact_email'         =>                 "sanjeevvsanjeev1@gmail.com",
        ];
    }
}

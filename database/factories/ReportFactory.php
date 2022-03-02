<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ReportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $users = \App\Models\User::pluck('id')->toArray();
        $categories = \App\Models\Category::pluck('id')->toArray();
        $report_type = $this->faker->randomElement(['lost', 'found']);
        $title = $this->faker->unique->word();
        $slug = Str::slug($title, '-');
        return [
            'title'                     =>            $title,
            'slug'                      =>            $slug,
            'description'               =>            $this->faker->paragraph(rand(5,10), $variableNbSentences = true),
            'reported_by'               =>            $this->faker->randomElement($users),
            'category_id'               =>            $this->faker->randomElement($categories),
            'brand'                     =>            $this->faker->company(),
            'report_type'               =>            $report_type,
            'verified'                  =>            $this->faker->biasedNumberBetween($min = 0, $max = 1, $function = 'sqrt'),
            'contact_number'            =>            $this->faker->numerify('##########'),
            'contact_email'             =>            $this->faker->safeEmail(),
            'created_at'                =>             Now(),
            'updated_at'                =>             Now(),
        ];
    }
}

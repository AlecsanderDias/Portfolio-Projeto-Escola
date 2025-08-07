<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Grade>
 */
class GradeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $rdQuarter = rand(1,4);
        $rdGrade1 = rand(0,9) + (rand(0,10) / 10) + (rand(0,10) / 100);
        $rdGrade2 = rand(0,9) + (rand(0,10) / 10) + (rand(0,10) / 100);
        return [
            'quarter' => $rdQuarter,
            'first_test' => $rdGrade1,
            'second_test' => $rdGrade2,
        ];
    }
}

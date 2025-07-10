<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SchoolClass>
 */
class SchoolClassFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $room = rand(10,99);
        $year = rand(2021,2025);
        $schoolYear = rand(1,10);
        return [
            'className' => fake()->text(10),
            'room' => $room,
            'year' => $year,
            'schoolYear' => $schoolYear
        ];
    }
}

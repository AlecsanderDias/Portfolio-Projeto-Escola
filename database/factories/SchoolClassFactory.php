<?php

namespace Database\Factories;

use App\Constants;
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
        $room = rand(0, count(Constants::ROOM_NAMES));
        $year = rand(2021,2025);
        $school_year = rand(1, count(Constants::SCHOOL_YEARS));
        return [
            'class_name' => fake()->text(10),
            'room' => $room,
            'year' => $year,
            'school_year' => $school_year,
        ];
    }
}

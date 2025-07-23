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
        return [
            'class_name' => fake()->text(10),
            'room' => rand(0, count(Constants::ROOM_NAMES)-1),
            'year' => rand(Constants::FOUNDATION_YEAR,(int)date("Y")),
            'school_year' => rand(1, count(Constants::SCHOOL_YEARS)),
        ];
    }
}

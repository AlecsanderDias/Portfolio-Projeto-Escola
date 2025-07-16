<?php

namespace Database\Factories;

use App\Constants;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subject>
 */
class SubjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $rd = rand(0, sizeof(Constants::SUBJECT_HOURS)-1);
        return [
            'name' => fake()->word(),
            'subject_hours' => Constants::SUBJECT_HOURS[$rd],
            'teacher_id' => rand(1, (int)max(Teacher::all('id')->toArray())),
        ];
    }
}

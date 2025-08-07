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
        $rdName = rand(0, sizeof(Constants::CORE_SUBJECTS)-1);
        $rdHours = rand(0, sizeof(Constants::SUBJECT_HOURS)-1);
        $rdYear = rand(1, sizeof(Constants::SCHOOL_YEARS));
        $maxId = max(Teacher::all('id')->toArray());
        return [
            'subject_name' => Constants::CORE_SUBJECTS[$rdName],
            'subject_hours' => Constants::SUBJECT_HOURS[$rdHours],
            'school_year' => Constants::SCHOOL_YEARS[$rdYear],
            'teacher_id' => rand(1, $maxId['id']),
        ];
    }
}

<?php

namespace Database\Factories;

use App\Constants;
use App\Models\SchoolClass;
use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lesson>
 */
class LessonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $maxSubjectId = max(Subject::getAllSubjectsIdArray());
        $maxSchoolClassId = max(SchoolClass::getAllSchoolClassesIdArray());
        $time = rand(0, (int)sizeof(Constants::LESSONS_SCHEDULE)-1);
        return [
            'day' => date('dd-mm-YYYY'),
            'time' => $time,
            'subject_id' => rand(1, $maxSubjectId),
            'school_class_id' => rand(1, $maxSchoolClassId),
        ];
    }
}

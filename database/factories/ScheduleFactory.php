<?php

namespace Database\Factories;

use App\Constants;
use App\Models\SchoolClass;
use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Schedule>
 */
class ScheduleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $day = rand(0, count(Constants::SCHOOL_DAYS)-1);
        $hour = rand(0, count(Constants::LESSONS_SCHEDULE)-1);
        $semester = rand(1,2);
        $maxSubjectId = max(Subject::getAllSubjectsIdArray());
        $maxSchoolClassId = max(SchoolClass::getAllSchoolClassesIdArray());
        $subject = rand(1, $maxSubjectId['id']);
        $schoolClass = rand(1, $maxSchoolClassId['id']);
        return [
            'day' => $day,
            'hour' => $hour,
            'semester' => $semester,
            'subject_id' => $subject,
            'school_class_id' => $schoolClass,
        ];
    }
}

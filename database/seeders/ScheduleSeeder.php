<?php

namespace Database\Seeders;

use App\Constants;
use App\Models\Schedule;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $classes = env('NUMBER_CLASSES_YEAR',2);
        $schoolYears = env('NUMBER_SCHOOL_YEARS',3);
        $semester = 1;
        $lessonsSchdule = Constants::LESSONS_SCHEDULE;
        $schoolDays = Constants::SCHOOL_DAYS;
        $totalWeeklyLessons = (int)(count($lessonsSchdule) * count($schoolDays));
        for($i=1;$i<=$schoolYears;$i++) {
            for($j=1;$j<=$classes;$j++) {
                $day = 0;
                $hour = 0;
                for($k=0;$k<$totalWeeklyLessons;$k++) {
                    Schedule::factory()->create([
                        'day' => $schoolDays[$day],
                        'hour' => $lessonsSchdule[$hour],
                        'semester' => $semester,
                        'subject_id' => null,
                        'school_class_id' => $i * $j,
                    ]);
                    $hour++;
                    if($hour > 4) {
                        $hour = 0;
                        $day++;
                    }
                }
            }
        }
    }
}

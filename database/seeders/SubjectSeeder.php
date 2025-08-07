<?php

namespace Database\Seeders;

use App\Constants;
use App\Models\Subject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach(Constants::SCHOOL_YEARS as $year => $schoolYear) {
            foreach(Constants::CORE_SUBJECTS as $subject) {
                // Subject::factory(env('SUBJECT_SEEDER', 10))->create();
                Subject::factory()->create([
                    'subject_name' => $subject,
                    'school_year' => $year
                ]);
            }
        }
    }
}

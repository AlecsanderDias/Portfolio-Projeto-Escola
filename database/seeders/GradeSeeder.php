<?php

namespace Database\Seeders;

use App\Models\Grade;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $studentsId = Student::getAllStudentsIdArray();
        $subjectsId = Subject::getAllSubjectsIdArray();
        foreach($studentsId as $studentId) {
            foreach($subjectsId as $subjectId) {
                Grade::factory()->create([
                    'student_id' => $studentId['id'],
                    'subject_id' => $subjectId['id'], 
                ]);
            }
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Grade;
use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Student::factory()
            ->count(env('STUDENT_SEEDER',10))
            ->has(User::factory())
            // ->has(Grade::factory())
            // ->hasUser(1, [
            //     'registration' => generateRegistration('student')
            // ])
            ->create();
    }
}

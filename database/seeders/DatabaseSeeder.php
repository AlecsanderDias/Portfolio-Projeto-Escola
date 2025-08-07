<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            // UserInformationSeeder::class,
            StudentSeeder::class,
            TeacherSeeder::class,
            WorkerSeeder::class,
            SchoolClassSeeder::class,
            SubjectSeeder::class,
            GradeSeeder::class,
        ]);

    }
}

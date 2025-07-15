<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Worker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WorkerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Worker::factory()
            ->count(env('WORKER_SEEDER',10))
            ->has(User::factory()->count(1))
            ->create();
    }
}

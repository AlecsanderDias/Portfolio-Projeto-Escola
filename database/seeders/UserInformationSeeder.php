<?php

namespace Database\Seeders;

use App\Models\Information;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserInformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()
            ->count(env('USER_INFORMATION_SEEDER',10))
            ->has(Information::factory()->count(1))
            ->create();
    }
}

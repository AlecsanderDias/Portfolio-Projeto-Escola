<?php

namespace Database\Factories;

use App\Constants;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Worker>
 */
class WorkerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $role = Constants::USER_TYPES[rand(2,3)];
        return [
            'role' => $role,
            'user_id' => User::factory()->state(['registration' => generateRegistration($role)]),
        ];
    }
}

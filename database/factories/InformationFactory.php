<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Information>
 */
class InformationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $gender = ['male', 'female'];
        $cpf = "".fake()->randomNumber(5, true).fake()->randomNumber(6, true)."";
        return [
            'name' => fake()->firstName(),
            'surname' => fake()->lastName(),
            'email' => fake()->unique()->email(),
            'birthDate' => fake()->date(),
            'gender' => $gender[rand(0,1)],
            'cpf' => $cpf,
        ];
    }
}

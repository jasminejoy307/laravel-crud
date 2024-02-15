<?php

namespace Database\Factories;

use App\Models\Departments;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teachers>
 */
class TeachersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $depart= Departments::pluck('id')->toArray();
        return [
            'name'   => fake()->name(),
            'email'  => fake()->unique()->safeEmail(),
            'phone'   => fake()->numerify('##########'),
            'dep_id' => fake()->randomElement($depart),
        ];
    }
}

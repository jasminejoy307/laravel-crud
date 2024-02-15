<?php

namespace Database\Factories;

use App\Models\Room;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $rooms = Room::pluck('id')->toArray();
        return [
            'sname'   => fake()->name(),
            'semail'  => fake()->unique()->safeEmail(),
            'image'   => 'profile.png',
            'phone'   => fake()->numerify('##########'),
            'classId' => fake()->randomElement($rooms),
        ];
    }
}

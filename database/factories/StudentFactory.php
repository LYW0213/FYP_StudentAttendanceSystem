<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
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
        return [
            'users_id' => rand(1,51),
            'studentId' => fake()->id(),
            'course_id'=> rand(1,51),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10), 
        ];
    }
}

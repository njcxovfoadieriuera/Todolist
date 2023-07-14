<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Task;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'folder_id' => 1,
            'title' => fake()->title(),
            'status' => fake()->numberBetween(1,3),
            'due_date' => fake()->dateTimeBetween($startDate = 'now', $endDate = '+1 week')->format('Y/m/d'),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}

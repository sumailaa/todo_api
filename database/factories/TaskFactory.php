<?php

declare(strict_types=1);
namespace Database\Factories;

use App\Models\User;
use Domains\Workflow\Enums\TaskStatus;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    public $array = [ 'open', 'close' ];
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'description' => fake()->text(),
            'status' => Arr::random($this->array),
            'user_id' => User::all()->random()->id,
            'due_at' => fake()->dateTime(),
            'completed_at' => now(),
        ];
    }
}

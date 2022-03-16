<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'task_name'=> 'Task '.$this->faker->word,
            'due_date' => now(),
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}

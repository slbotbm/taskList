<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
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
            'user_id' => null, 
            'task'=> fake()->sentence(3),
            'description'=> fake()->paragraph(10),
            'completed' => fake()->boolean(),
            'created_at'=>fake()->dateTimeBetween('-2 years'),
            'updated_at'=>function (array $attributes) {
                return fake()-> dateTimeBetween($attributes['created_at']);
            },
            'completed_at'=>function (array $attributes) {
                    if ($attributes['completed'] === true) {
                        return $attributes['updated_at'];
                    } else {
                        return $attributes['created_at'];
                    }
                }
        ];
    }


}

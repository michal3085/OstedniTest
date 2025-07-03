<?php

namespace Database\Factories;

use App\Models\Goal;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<Goal>
 */
class GoalFactory extends Factory
{
    protected $model = Goal::class;

    public function definition()
    {
        return [
            'title' => $this->faker->catchPhrase(),
            'description' => $this->faker->sentence(),
        ];
    }
}

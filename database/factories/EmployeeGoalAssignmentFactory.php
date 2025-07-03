<?php

namespace Database\Factories;

use App\Models\Employee;
use App\Models\Goal;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EmployeeGoalAssignment>
 */
class EmployeeGoalAssignmentFactory extends Factory
{
    protected $model = \App\Models\EmployeeGoalAssignment::class;

    public function definition()
    {
        return [
            'employee_id' => Employee::factory(),
            'goal_id' => Goal::factory(),
        ];
    }
}

<?php


namespace Database\Seeders;

use App\Models\Employee;
use App\Models\Goal;
use App\Models\EmployeeGoalAssignment;
use Illuminate\Database\Seeder;

class EmployeeGoalAssignmentSeeder extends Seeder
{
    public function run(): void
    {
        $employees = Employee::all();
        $goals = Goal::all();

        foreach ($employees as $employee) {
            $goalsToAssign = $goals->random(rand(1, min(3, $goals->count())));

            foreach ($goalsToAssign as $goal) {
                EmployeeGoalAssignment::firstOrCreate([
                    'employee_id' => $employee->id,
                    'goal_id' => $goal->id,
                ]);
            }
        }
    }
}

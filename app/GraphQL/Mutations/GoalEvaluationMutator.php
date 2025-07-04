<?php

namespace App\GraphQL\Mutations;

use App\Models\EmployeeGoalAssignment;
use App\Models\GoalEvaluation;
use Illuminate\Support\Facades\Validator;

class GoalEvaluationMutator
{
    public function submit($_, array $args): GoalEvaluation
    {
        $validator = Validator::make($args, [
            'employee_id' => ['required', 'exists:employees,id'],
            'goal_id' => ['required', 'exists:goals,id'],
            'progress' => ['required', 'integer', 'between:0,100'],
        ]);

        $validator->validate();

        $assignment = EmployeeGoalAssignment::firstOrCreate([
            'employee_id' => $args['employee_id'],
            'goal_id' => $args['goal_id'],
        ]);

        $goalEvaluation = GoalEvaluation::updateOrCreate(
            ['assignment_id' => $assignment->id],
            ['progress' => $args['progress']]
        );

        $goalEvaluation->load('assignment.employee', 'assignment.goal');

        return $goalEvaluation;
    }
}

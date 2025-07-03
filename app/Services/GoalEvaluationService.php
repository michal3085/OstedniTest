<?php

namespace App\Services;

use App\Models\EmployeeGoalAssignment;
use App\Models\GoalEvaluation;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Exception;

class GoalEvaluationService
{
    public function submitEvaluation(int $employeeId, int $goalId, int $progress): GoalEvaluation
    {
        try {
            return DB::transaction(function () use ($employeeId, $goalId, $progress) {
                $assignment = EmployeeGoalAssignment::where('employee_id', $employeeId)
                    ->where('goal_id', $goalId)
                    ->firstOrFail();

                return GoalEvaluation::updateOrCreate(
                    ['assignment_id' => $assignment->id],
                    ['progress' => $progress]
                );
            });
        } catch (ModelNotFoundException $e) {
            throw new \InvalidArgumentException('Employee or goal not found.');
        } catch (Exception $e) {
            throw new \RuntimeException('An error occurred while saving the evaluation.');
        }
    }
}

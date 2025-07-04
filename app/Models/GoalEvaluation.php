<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GoalEvaluation extends Model
{
    protected $fillable = ['assignment_id', 'progress'];

    public function assignment()
    {
        return $this->belongsTo(EmployeeGoalAssignment::class, 'assignment_id');
    }

    public function employee()
    {
        return $this->hasOneThrough(
            Employee::class,
            EmployeeGoalAssignment::class,
            'id',
            'id',
            'assignment_id',
            'employee_id',
        );
    }

    public function goal()
    {
        return $this->hasOneThrough(
            Goal::class,
            EmployeeGoalAssignment::class,
            'id',
            'id',
            'assignment_id',
            'goal_id',
        );
    }
}

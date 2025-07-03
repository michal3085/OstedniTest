<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GoalEvaluation extends Model
{
    use HasFactory;

    protected $fillable = [
        'assignment_id',
        'progress',
    ];

    public function assignment(): BelongsTo
    {
        return $this->belongsTo(EmployeeGoalAssignment::class, 'assignment_id');
    }
}

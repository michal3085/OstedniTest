<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\GoalEvaluationController;

Route::middleware('api')->group(function () {
    Route::post('/goal-evaluation', [GoalEvaluationController::class, 'store'])
        ->name('goal-evaluation.store');
});

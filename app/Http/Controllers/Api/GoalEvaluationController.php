<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEvaluationRequest;
use App\Http\Resources\GoalEvaluationResource;
use App\Services\GoalEvaluationService;
use Illuminate\Http\JsonResponse;

class GoalEvaluationController extends Controller
{
    public function __construct(protected GoalEvaluationService $service) {}

    public function store(StoreEvaluationRequest $request): JsonResponse
    {
        try {
            $data = $request->validated();

            $evaluation = $this->service->submitEvaluation(
                $data['employee_id'],
                $data['goal_id'],
                $data['progress']
            );

            return response()->json([
                'message' => 'Evaluation has been submitted',
                'data' => new GoalEvaluationResource($evaluation),
            ], 201);

        } catch (\InvalidArgumentException $e) {
            return response()->json(['error' => $e->getMessage()], 404);
        } catch (\RuntimeException $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}

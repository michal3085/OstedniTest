<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GoalEvaluationResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'progress' => $this->progress,
            'employee' => [
                'id' => $this->assignment->employee->id,
                'name' => $this->assignment->employee->name,
                'email' => $this->assignment->employee->email,
                'position' => $this->assignment->employee->position,
            ],
            'goal' => [
                'id' => $this->assignment->goal->id,
                'title' => $this->assignment->goal->title,
            ],
            'updated_at' => $this->updated_at,
        ];
    }
}

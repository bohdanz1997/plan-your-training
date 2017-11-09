<?php

namespace App\Http\Controllers\api;

use App\Services\WorkoutService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WorkoutController extends Controller
{
    protected $workoutService;

    public function __construct(WorkoutService $workoutService)
    {
        $this->workoutService = $workoutService;
    }

    public function store(Request $request)
    {
        $workout = $this->workoutService->saveWithSets($request->all());

        return [
            'message' => 'Тренування створено',
            'workout' => $workout->toArray()
        ];
    }
}

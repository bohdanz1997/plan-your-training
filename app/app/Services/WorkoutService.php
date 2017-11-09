<?php

namespace App\Services;

use App\Workout;
use Illuminate\Support\Facades\Auth;

class WorkoutService
{
    public function __construct(
    ) {
    }

    public function saveWithSets($data)
    {
        /* @var Workout $workout */
        $workout = Workout::create($data);

        $workout->user()->associate(Auth::user());
        $workout->save();

        $workout->sets()->attach($data['sets']);

        return $workout;
    }
}
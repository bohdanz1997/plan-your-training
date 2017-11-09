<?php

namespace App\Repositories;

use App\Set;
use Illuminate\Support\Facades\Auth;

class SetRepository
{
    public static function forTrainingAndExerciseFirst($trainingId, $exerciseId)
    {
        //todo change if upgrade laravel to 5.5
        //todo make base class with method getCurrentUser()
        return Set
            ::join('sets_trainings', 'sets_trainings.set_id', '=', 'sets.id')
            ->join('trainings', 'trainings.id', '=', 'sets_trainings.training_id')
            ->whereColumn([
                ['exercise_id', '=', $exerciseId],
                ['trainings.user_id', '=', Auth::user()->id],
                ['sets_trainings.training_id', '=', $trainingId]
            ])
            ->first();
    }

    public static function forTrainingAndExercise($trainingIds, $exerciseId)
    {
        //todo change if upgrade laravel to 5.5
        return Set
            ::join('sets_trainings', 'sets_trainings.set_id', '=', 'sets.id')
            ->join('trainings', 'trainings.id', '=', 'sets_trainings.training_id')
            ->where(function ($query) use ($trainingIds, $exerciseId) {
                $query->where('exercise_id', $exerciseId)
                    ->where('trainings.user_id', Auth::user()->id)
                    ->whereIn('sets_trainings.training_id', $trainingIds);
            })
            ->orderBy('date_start', 'desc')
            ->get();
    }
}
<?php

namespace App\Observers;

use App\Set;
use App\Workout;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class TrainingObserver
{
    public function created(Workout $training)
    {
        $training->date_start = Carbon::now();
        $training->user()->associate(Auth::user());
        $training->save();
    }

    public function deleting(Workout $training)
    {
        $sets = $training->sets()->pluck('sets.id')->toArray();
        Set::destroy($sets);

        $training->sets()->detach();
    }
}
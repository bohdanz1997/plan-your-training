<?php

namespace App\Services;

use App\Workout;
use Carbon\Carbon;

class TrainingService extends AbstractService
{
    /**
     * @param $data
     * @return bool
     */
    public function start($data)
    {
        $user = $this->getCurrentUser();

        if ($user->hasActiveTraining()) {
            return false;
        }

        $training = Workout::create($data);
        $user->training()->associate($training);
        $user->save();

        return true;
    }

    public function finish()
    {
        $user = $this->getCurrentUser();

        //todo
//        $user->training()->update([
//            'is_finished' => true,
//            'date_end' => Carbon::now()
//        ]);

        if ($user->hasActiveTraining()) {
            $user->training->is_finished = true;
            $user->training->date_end = Carbon::now();
            $user->training->save();
            $user->training()->dissociate();
            $user->save();

            return true;
        }

        return false;
    }

    public function abort()
    {
        $user = $this->getCurrentUser();

        if ($user->hasActiveTraining()) {
            $user->training()->delete();
            $user->training()->dissociate();
            $user->save();

            return true;
        }

        return false;
    }
}
<?php

namespace App\Repositories;

use App\Workout;

class TrainingRepository
{
    /**
     * @param $templateId
     * @return mixed
     */
    public function forTemplateLastFinished($templateId)
    {
        return Workout
            ::where('template_id', $templateId)
            ->orderBy('date_start', 'desc')
            ->where('is_finished', true)
            ->first();
    }

    /**
     * @param $templateId
     * @return mixed
     */
    public function forTemplateFinishedIds($templateId)
    {
        return Workout
            ::where('template_id', $templateId)
            ->where('is_finished', true)
            ->pluck('id');
    }
}
<?php

namespace App\Services;

use App\Repositories\TrainingRepository;
use App\Repositories\SetRepository;
use App\Set;

class SetService extends AbstractService
{
    /**
     * @var TrainingRepository
     */
    private $trainingRepository;
    /**
     * @var SetRepository
     */
    private $setRepository;

    public function __construct(
        TrainingRepository $trainingRepository,
        SetRepository $setRepository
    ) {
        $this->trainingRepository = $trainingRepository;
        $this->setRepository = $setRepository;
    }

    /**
     * @param $exercises
     */
    public function saveAndUpdatePivot($exercises)
    {
        $user = $this->getCurrentUser();

        foreach ($exercises as $exerciseId => $exercise) {
            $setModel = Set::create(array_merge(
                ['exercise_id' => $exerciseId],
                $exercise
            ));

            $setModel->trainings()->attach($user->training->id);
        }
    }

    /**
     * @param $template
     * @param $exercises
     * @return array
     */
    public function getSetsFromLastTraining($template, $exercises)
    {
        //todo maybe need refactoring in future
        $exercisesData = [];

        $lastFinishedTraining = $this->trainingRepository
            ->forTemplateLastFinished($template->id);

        foreach ($exercises as $exercise) {
            $set = isset($lastFinishedTraining)
                ? $this->setRepository
                    ->forTrainingAndExerciseFirst($lastFinishedTraining->id, $exercise->id)
                : null;

            $exercisesData[$exercise->id] = [
                'exercise' => $exercise,
                'set' => $set
            ];
        }

        return $exercisesData;
    }

    /**
     * @param $templates
     * @return array
     */
    public function getSetsFromAllTrainings($templates)
    {
        $history = [];

        foreach ($templates as $template) {
            $trainingIds = $this->trainingRepository
                ->forTemplateFinishedIds($template->id);

            foreach ($template->exercises as $exercise) {
                $sets = $this->setRepository
                    ->forTrainingAndExercise($trainingIds, $exercise->id)
                    ->toArray();

                $history[$template->title][$exercise->title] = $sets;
            }
        }

        return $history;
    }
}
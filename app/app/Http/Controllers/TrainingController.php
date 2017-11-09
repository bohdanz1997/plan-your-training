<?php

namespace App\Http\Controllers;

use App\Services\SetService;
use App\Services\TrainingService;
use App\Workout;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;

class TrainingController extends Controller
{
    /**
     * @var TrainingService
     */
    private $trainingService;
    /**
     * @var SetService
     */
    private $setService;


    public function __construct(
        TrainingService $trainingService,
        SetService $setService
    ) {
        $this->middleware('auth');

        $this->trainingService = $trainingService;
        $this->setService = $setService;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\Response
     *
     */
    public function start(Request $request)
    {
        if ($this->trainingService->start($request->all())) {
            return redirect()->route('training.show-active');
        }

        return view('training.errors.training-exists');
    }

    public function abort()
    {
        if ($this->trainingService->abort()) {
            return redirect()->route('account.index');
        }

        return view('training.errors.no-training');
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function showActive()
    {
        $training = $this->getCurrentUser()->training;

        if ($training) {
            $exercisesData = $this->setService->getSetsFromLastTraining(
                $training->template,
                $training->template->exercises
            );

            return view('training.show', compact(
                'training',
                'exercisesData'
            ));
        }

        return view('training.errors.no-training');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function clearAll()
    {
        $user = $this->getCurrentUser();

        $trainings = $user->trainings()->finished();

        foreach ($trainings as $training) {
            $training->delete();
        }

        return redirect()->route('training.history');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->setService->saveAndUpdatePivot($request->exercises);

        if ($this->trainingService->finish()) {
            return redirect()->route('account.index');
        }

        return view('training.errors.no-training');
    }

    public function history()
    {
        $templates = $this->getCurrentUser()->templates;

        $history = $this->setService
            ->getSetsFromAllTrainings($templates);

        return view('training.history', [
           'history' => $history
        ]);
    }
}

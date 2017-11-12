<?php

namespace App\Http\Controllers\api;

use App\Exercise;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExerciseController extends Controller
{
    public function all()
    {
        return Exercise::all()->toArray();
    }

    public function store(Request $request)
    {
        $exercise = Exercise::create($request->all());

        return [
            'message' => 'Вправа збережена',
            'exercise' => $exercise->toArray()
        ];
    }
}

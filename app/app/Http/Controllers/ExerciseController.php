<?php

namespace App\Http\Controllers;

use App\Exercise;
use App\Set;
use Illuminate\Http\Request;

class ExerciseController extends Controller
{
    public function getByGroup($groupId)
    {
        return [
            'exercises' => Exercise::where('group_id', $groupId)->get()
        ];
    }
}
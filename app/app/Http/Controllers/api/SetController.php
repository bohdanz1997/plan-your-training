<?php

namespace App\Http\Controllers\api;

use App\Set;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SetController extends Controller
{
    public function all()
    {
        return Set::all()->toArray();
    }

    public function store(Request $request)
    {
        $set = Set::create($request->all());

        return [
            'message' => 'Тренування збережено',
            'set' => $set->toArray()
        ];
    }

    public function update(Request $request, Set $set)
    {
        $set->update($request->all());

        return [
            'message' => 'Тренування оновлено',
            'set' => $set->toArray()
        ];
    }

    public function destroy(Set $set)
    {
        $set->workouts()->detach();
        $set->delete();

        return ['message' => 'Сет видалено'];
    }
}

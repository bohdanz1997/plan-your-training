<?php

namespace App\Http\Controllers\api;

use App\Group;
use App\Http\Controllers\Controller;
use App\Repositories\GroupRepository;

class GroupController extends Controller
{
    public function all(GroupRepository $repo)
    {
        return Group::with('exercises')->get();
    }
}

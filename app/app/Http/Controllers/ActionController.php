<?php

namespace App\Http\Controllers;

use App\Set;
use Illuminate\Http\Request;

class ActionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
}

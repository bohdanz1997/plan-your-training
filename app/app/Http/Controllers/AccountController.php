<?php

namespace App\Http\Controllers;

use App\Template;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $templates = Auth::user()->templates;

        return view('account.index', compact(
            'templates'
        ));
    }

}

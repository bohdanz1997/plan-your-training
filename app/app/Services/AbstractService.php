<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;

class AbstractService
{
    /**
     * @return \App\User
     */
    protected function getCurrentUser()
    {
        return Auth::user();
    }
}
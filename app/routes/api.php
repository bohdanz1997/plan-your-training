<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['web']], function () {
    Route::post('login', 'Auth\LoginController@doLogin');
    Route::post('logout', 'Auth\LoginController@doLogout');
});

Route::get('set/all', 'api\SetController@all');
Route::post('set', 'api\SetController@store');
Route::put('set/{set}', 'api\SetController@update');
Route::delete('set/{set}', 'api\SetController@destroy');

Route::get('exercise/all', 'api\ExerciseController@all');
Route::post('exercise', 'api\ExerciseController@store');

Route::get('group/all', 'api\GroupController@all');

Route::post('workout', 'api\WorkoutController@store');

Route::get('user/auth', 'api\UserController@getAuthUser');
<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('exercise/get-by-group/{groupId}', 'ExerciseController@getByGroup');
Route::post('training/start', 'TrainingController@start')->name('training.start');
Route::get('training/show-active', 'TrainingController@showActive')->name('training.show-active');
Route::get('training/history', 'TrainingController@history')->name('training.history');
Route::delete('training/clear', 'TrainingController@clearAll')->name('training.clear');
Route::post('training/abort', 'TrainingController@abort')->name('training.abort');
Route::resource('account', 'AccountController');
Route::resource('template', 'TemplateController');
Route::resource('training', 'TrainingController');

Route::get('api/set/all', 'api\SetController@all');
Route::post('api/set', 'api\SetController@store');
Route::put('api/set/{set}', 'api\SetController@update');
Route::delete('api/set/{set}', 'api\SetController@destroy');

Route::post('api/workout', 'api\WorkoutController@store');

Auth::routes();
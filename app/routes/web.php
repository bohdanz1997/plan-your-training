<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/home', function () {
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




//Auth::routes();
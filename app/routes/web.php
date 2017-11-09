<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

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

Auth::routes();
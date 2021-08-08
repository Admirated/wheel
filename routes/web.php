<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function(){
    return redirect(Route('page', ['page' => 'register']));
});

Route::get('/{page}', 'PageController@page')->name('page');

Route::get('/{page}/{id}', 'PageController@page')->name('chooseBig');
Route::get('/', 'PageController@page')->name('MainUrl');

Route::post('/api/user/auth', 'UserController@Auth')->name('Auth');
Route::post('/api/user/agree', 'UserController@Agree')->name('Agree');
Route::post('/api/user/agree/return', 'UserController@AgreeReturn')->name('AgreeReturn');
Route::post('/api/user/balancewheel/get', 'PageController@BalanceWheel')->name('BalanceWheel');
Route::post('/api/user/choosebig/get', 'PageController@ChooseCircle')->name('ChooseCircle');
Route::post('/api/user/choosebig/task/create', 'PageController@CreateTask')->name('CreateTask');
Route::post('/api/user/choosewheels/get', 'PageController@ChoosheWheels')->name('ChoosheWheels');
Route::post('/api/user/replace/info', 'UserController@ReplaceUserInfo')->name('ReplaceUserInfo');
Route::post('/api/user/create/task', 'MainController@CreateTask')->name('CreateTask');
Route::post('/api/user/check/session', 'UserController@CheckSession')->name('CheckSession');
Route::post('/api/user/create/circle', 'MainController@CreateCircle')->name('CreateCircle');

Route::post('/api/user/create/tohabit', 'UserController@CreateToHabit')->name('CreateToHabit');
Route::post('/api/user/create/nothabit', 'UserController@CreateNotHabit')->name('CreateNotHabit');
Route::post('/api/user/create/tovalue', 'UserController@CreateToValue')->name('CreateToValue');
Route::post('/api/user/create/skills', 'UserController@CreateSkill')->name('CreateSkill');
Route::post('/api/user/create/Interests', 'UserController@CreateInterests')->name('CreateInterests');
Route::post('/api/user/create/habit', 'UserController@CreateHabits')->name('CreateHabits');
Route::post('/api/user/create/Destinations', 'UserController@CreateDestinations')->name('CreateDestinations');
Route::post('/api/send/message', "MainController@MessageSendUrl")->name('MessageSendUrl');
Route::post('/api/user/create/note', 'UserController@CreateNote')->name('CreateNote');
Route::post('/api/user/create/default', 'PageController@CreateCircles')->name('CreateCircles');
Route::post('/api/user/agree/task', 'CircleController@AgreeTask')->name('AgreeTask');
//Route::post('/api/user/delete/task', 'CircleController@DeleteTask')->name('DeleteTask');
<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


Route::get('/', function()
{
	if(Auth::check()){
		return Redirect::to('plan');
	}else{
		return View::make('homepage');
	}
});

Route::get('/privacy', function()
{
    return View::make('privacypolicy');
});

Route::controller('user', 'UserController');
Route::controller('plan', 'PlanController', ['before' => 'auth']);
Route::controller('item', 'ItemController');

Route::filter('auth', function()
{
	if (Auth::guest()) return Redirect::to('user/login');
});
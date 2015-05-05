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

Route::get('/', 'AdminController@getlogin');
Route::get('admin', 'AdminController@getlogin');

Route::controller('admin', 'AdminController');
Route::controller('users', 'UsersController');

Route::post('register', array('before' => 'csrf', function()
{
    return 'You gave a valid CSRF token!';
}));
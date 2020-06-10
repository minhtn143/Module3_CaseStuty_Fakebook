<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/timeline', 'TimelineController@index')->name('timeline.index');
Route::get('/timeline/upload/avatar/{id}/{avatar}','UserController@uploadAvatar')->name('user.update.avatar');

Route::get('redirect/{driver}', 'SocialController@redirect')
    ->name('login.provider')
    ->where('driver', implode('|', config('auth.socialite.drivers')));
Route::get('/callback/{provider}', 'SocialController@callback');

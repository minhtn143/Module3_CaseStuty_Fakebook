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

Route::group(['prefix' => 'timeline'], function () {
    Route::get('/', 'TimelineController@index')->name('timeline.index');
    Route::post('/', 'PostController@store')->name('timeline.post');
});

Route::get('redirect/{driver}', 'SocialController@redirect')
    ->name('login.provider')
    ->where('driver', implode('|', config('auth.socialite.drivers')));
Route::get('/callback/{provider}', 'SocialController@callback');

Route::group(['prefix' => 'home'], function () {
    Route::post('/post', 'PostController@store')->name('post.store');
});



/*Friends*/
Route::get('/friends', [
    'uses' => 'FriendController@getIndex',
    'as' => 'friends.index',
    'middleware' => ['auth'],
]);
Route::get('/friends/add/{id}', [
    'uses' => 'FriendController@getAdd',
    'as' => 'friends.add',
    'middleware' => ['auth'],
]);
Route::get('/friends/accept/{id}', [
    'uses' => 'FriendController@getAccept',
    'as' => 'friends.accept',
    'middleware' => ['auth'],
]);

Route::delete('/friends/delete/{id}', [
    'uses' => 'FriendController@postDelete',
    'as' => 'friends.delete',
    'middleware' => ['auth'],
]);

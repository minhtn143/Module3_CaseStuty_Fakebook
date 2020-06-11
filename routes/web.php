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
    // Route::get('/', 'PostController@getAllPosts')->name('timeline.index');
    Route::get('/{id}', "PostController@getAllPostsByUserId")->name('timeline.index');
    Route::post('/', 'PostController@store')->name('timeline.post');
});

Route::get('redirect/{driver}', 'SocialController@redirect')
    ->name('login.provider')
    ->where('driver', implode('|', config('auth.socialite.drivers')));
Route::get('/callback/{provider}', 'SocialController@callback');

Route::group(['prefix' => 'home'], function () {
    Route::group(['prefix' => 'post'], function () {
        Route::post('/', 'PostController@store')->name('post.store');
        Route::post('/{postId}/comment', 'PostController@comment')->name('post.comment');
    });
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
/*User Profile*/
Route::get('/user/{username}', [
    'uses' => 'ProfileController@getProfile',
    'as' => 'profile.index',
]);
Route::get('/profile/edit', [
    'uses' => 'ProfileController@getEdit',
    'as' => 'profile.edit',
    'middleware' => ['auth'],
]);
Route::post('/profile/edit', [
    'uses' => 'ProfileController@postEdit',
    'middleware' => ['auth'],
]);

Route::get('/profile/password', [
    'uses' => 'ProfileController@getUpdatePassword',
    'as' => 'profile.password',
    'middleware' => ['auth'],
]);

Route::post('/profile/password', [
    'uses' => 'ProfileController@postUpdatePassword',
    'as' => 'profile.passwordChange',
    'middleware' => ['auth'],
]);

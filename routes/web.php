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

Route::get('/timeline','TimelineController@index')->name('timeline.index');
Route::post('/upload','UserController@uploadAvatar')->name('user.update.avatar');

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

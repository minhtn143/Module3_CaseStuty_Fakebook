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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::group(['prefix' => 'timeline'], function () {
<<<<<<< HEAD
    Route::get('/timeline','TimelineController@index')->name('timeline');
    Route::post('/upload','UserController@uploadAvatar')->name('user.update.avatar');

    // Route::get('/', 'PostController@getAllPosts')->name('timeline.index');
=======
    Route::get('/message/{id}', 'HomeController@getMessage')->name('timeline.message');
    Route::post('message', 'HomeController@sendMessage');
>>>>>>> c45d44676cc6b4a17141c05edcec570ad12cbefe
    Route::get('/{id}/user', 'TimelineController@goToUserTimeline')->name('timeline.index');
    Route::post('/', 'PostController@store')->name('timeline.post');
    Route::get('/{id}/friends', 'TimelineController@userFriendList')->name('timeline.friends');
    Route::get('/{id}/profile', 'TimelineController@showProfile')->name('timeline.profile');
    Route::post('/cover/upload', 'UserController@uploadCoverPhoto')->name('upload.cover');
});

Route::get('redirect/{driver}', 'SocialController@redirect')
    ->name('login.provider')
    ->where('driver', implode('|', config('auth.socialite.drivers')));
Route::get('/callback/{provider}', 'SocialController@callback');

Route::group(['prefix' => '/'], function () {
    Route::get('/message/{id}', 'HomeController@getMessage')->name('newsFeed.message');
    Route::post('message', 'HomeController@sendMessage');
    Route::group(['prefix' => 'post'], function () {
        Route::post('/', 'PostController@store')->name('post.store');
        Route::post('/{postId}/comment', 'PostController@comment')->name('post.comment');
        Route::get('/{postId}/delete', 'PostController@destroy')->name('post.delete');
        Route::get('/search', 'HomeController@searchFriend')->name('friend.search');
    });
});

Route::group(['prefix' => 'friend'], function () {
    Route::get('/{friendId}/add', 'FriendController@store')->name('friend.add');
    Route::get('/{id}/delete', 'FriendController@destroy')->name('friend.delete');
    Route::get('/{id}/accept', 'FriendController@accept')->name('friend.accept');
});

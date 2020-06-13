<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\Friend;
use App\Http\Services\PostService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\Global_;

class TimelineController extends Controller
{
    protected $postService;
    public function __construct(PostService  $postService)
    {
        $this->postService = $postService;
    }


    public function goToUserTimeline($id)
    {
        $user = User::find($id);
        $posts = $this->postService->getAllPostsByUserId($id)->sortByDesc("created_at");
        $friend = Friend::where('user_id', Auth::user()->id)->where('friend_id', $id)->orWhere('user_id', $id)->where('friend_id', Auth::user()->id)->first();
        $friendRequests = Friend::where('friend_id', Auth::user()->id)->where('approval_status', 0)->get();

        $friendList = Friend::where(function ($query) {
            $query->where('user_id', Auth::user()->id)
                ->where('approval_status', 1);
        })->orWhere(function ($query) {
            $query->where('friend_id', Auth::user()->id)
                ->where('approval_status', 1);
        })->get();

        return view('timeline.index', compact('posts', 'friend', 'user', 'friendRequests', 'friendList'));
    }

    public function userFriendList($id)
    {
        $user = User::find($id);

        $friend = Friend::where('user_id', Auth::user()->id)->where('friend_id', $id)->orWhere('user_id', $id)->where('friend_id', Auth::user()->id)->first();
        $friendRequests = Friend::where('friend_id', Auth::user()->id)->where('approval_status', 0)->get();

        $friendList = Friend::where(function ($query) {
            $query->where('user_id', Auth::user()->id)
                ->where('approval_status', 1);
        })->orWhere(function ($query) {
            $query->where('friend_id', Auth::user()->id)
                ->where('approval_status', 1);
        })->get();

        $userFriendList = Friend::where('user_id', $id)->where('approval_status', 1)->orWhere('friend_id', $id)->where('approval_status', 1)->get();

        return view('timeline.friends', compact('user', 'friend', 'friendRequests', 'friendList', 'userFriendList'));
    }
}

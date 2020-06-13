<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\Friend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $friendRequests = Friend::where('friend_id', Auth::user()->id)->where('approval_status', 0)->get();
        $friendList = Friend::where(function ($query) {
            $query->where('user_id', Auth::user()->id)
                ->where('approval_status', 1);
        })->orWhere(function ($query) {
            $query->where('friend_id', Auth::user()->id)
                ->where('approval_status', 1);
        })->get();
        $posts = Post::orderBy('created_at', 'desc')->get();
        return view('newsfeed.home', compact('posts', 'friendRequests', 'friendList'));
    }

    public function searchFriend(Request $request)
    {
        $search = $request->get('search');
        $users = User::where('first_name', 'LIKE', '%' . $search . '%')
            ->orWhere('last_name', 'LIKE', '%' . $search . '%')
            ->orWhere('email', 'LIKE', '%' . $search . '%')->get();
        return view('newsfeed.search', compact('users'));
    }
}

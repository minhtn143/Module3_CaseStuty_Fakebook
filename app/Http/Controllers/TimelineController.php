<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\Friend;
use PhpParser\Node\Stmt\Global_;
use App\Http\Services\PostService;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

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

        $users = DB::select("select users.id, users.first_name, users.first_name, users.avatar, users.email, count(is_read) as unread
        from users LEFT  JOIN  messages ON users.id = messages.from and is_read = 0 and messages.to = " . Auth::id() . "
        where users.id != " . Auth::id() . "
        group by users.id, users.first_name, users.first_name, users.avatar, users.email");

        return view('timeline.index', compact('posts', 'friend', 'user', 'friendRequests', 'friendList', 'users'));
    }

    public function userFriendList($id)
    {
        $user = User::find($id);

        $friendRequests = Friend::where('friend_id', Auth::user()->id)->where('approval_status', 0)->get();

        $friend = Friend::where(function ($query) use ($id) {
            $query->where('user_id', Auth::user()->id)
                ->where('friend_id', $id);
        })->orWhere(function ($query) use ($id) {
            $query->where('friend_id', Auth::user()->id)
                ->where('user_id', $id);
        })->get();

        $friendList = Friend::where(function ($query) {
            $query->where('user_id', Auth::user()->id)
                ->where('approval_status', 1);
        })->orWhere(function ($query) {
            $query->where('friend_id', Auth::user()->id)
                ->where('approval_status', 1);
        })->get();

        $userFriendList = Friend::where(function ($query) use ($id) {
            $query->where('user_id', $id)
                ->where('approval_status', 1);
        })->orWhere(function ($query) use ($id) {
            $query->where('friend_id', $id)
                ->where('approval_status', 1);
        })->get();

        $users = DB::select("select users.id, users.first_name, users.first_name, users.avatar, users.email, count(is_read) as unread
        from users LEFT  JOIN  messages ON users.id = messages.from and is_read = 0 and messages.to = " . Auth::id() . "
        where users.id != " . Auth::id() . "
        group by users.id, users.first_name, users.first_name, users.avatar, users.email");

        return view('timeline.friends', compact('user', 'friend', 'friendRequests', 'friendList', 'userFriendList', 'users'));
    }

    public function showProfile($id)
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

        $users = DB::select("select users.id, users.first_name, users.first_name, users.avatar, users.email, count(is_read) as unread
        from users LEFT  JOIN  messages ON users.id = messages.from and is_read = 0 and messages.to = " . Auth::id() . "
        where users.id != " . Auth::id() . "
        group by users.id, users.first_name, users.first_name, users.avatar, users.email");

        return view('timeline.profile', compact('posts', 'friend', 'user', 'friendRequests', 'friendList', 'users'));
    }

    public function editProfile($id)
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

        $users = DB::select("select users.id, users.first_name, users.first_name, users.avatar, users.email, count(is_read) as unread
        from users LEFT  JOIN  messages ON users.id = messages.from and is_read = 0 and messages.to = " . Auth::id() . "
        where users.id != " . Auth::id() . "
        group by users.id, users.first_name, users.first_name, users.avatar, users.email");
        if ($id != Auth::id()) {
            abort('403');
        } else {
            return view('timeline.editProfile', compact('posts', 'friend', 'user', 'friendRequests', 'friendList', 'users'));
        }
    }

    public function getLike($postId)
    {
        $post = Post::find($postId);
        $user = User::find(Auth::user()->id);


        if ($user->likes->where("post_id", $postId)->count() > 0) {
            $post->likes()->where("user_id", $user->id)->delete();
            $liked = false;
        } else {
            $post->likes()->create([
                'user_id' => Auth::user()->id,
                'post_id' => $postId
            ]);
            $liked = true;
        }
        $countLiked = $post->countLiked();
        return response()->json([
            'liked' => $liked,
            'countLiked' => $countLiked,
        ], 200);
        // return redirect()->back();
    }

    public function showAllPhotos($id)
    {
        $user = User::find($id);

        $friendRequests = Friend::where('friend_id', Auth::user()->id)->where('approval_status', 0)->get();

        $friend = Friend::where(function ($query) use ($id) {
            $query->where('user_id', Auth::user()->id)
                ->where('friend_id', $id);
        })->orWhere(function ($query) use ($id) {
            $query->where('friend_id', Auth::user()->id)
                ->where('user_id', $id);
        })->get();

        $friendList = Friend::where(function ($query) {
            $query->where('user_id', Auth::user()->id)
                ->where('approval_status', 1);
        })->orWhere(function ($query) {
            $query->where('friend_id', Auth::user()->id)
                ->where('approval_status', 1);
        })->get();

        $userFriendList = Friend::where(function ($query) use ($id) {
            $query->where('user_id', $id)
                ->where('approval_status', 1);
        })->orWhere(function ($query) use ($id) {
            $query->where('friend_id', $id)
                ->where('approval_status', 1);
        })->get();

        $users = DB::select("select users.id, users.first_name, users.first_name, users.avatar, users.email, count(is_read) as unread
        from users LEFT  JOIN  messages ON users.id = messages.from and is_read = 0 and messages.to = " . Auth::id() . "
        where users.id != " . Auth::id() . "
        group by users.id, users.first_name, users.first_name, users.avatar, users.email");

        $images = User::find($id)->photos;

        return view('timeline.images', compact('user', 'friend', 'friendRequests', 'friendList', 'userFriendList', 'users', 'images'));
    }
}

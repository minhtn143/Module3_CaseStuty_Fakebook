<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\Friend;
use App\Http\Services\PostService;
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


    public function goFriendIndex($id)
    {
        $user = User::find($id);
        $posts = $this->postService->getAllPostsByUserId($id)->sortByDesc("created_at");
        $friend = Friend::where('user_id', Auth::user()->id)->where('friend_id', $id)->first();
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

    public function getLike($postId)
    {
        $posts = Post::find($postId);

        $user = User::find(Auth::user()->id);
        if ($user->hasLikedPosts($posts, $user->id)) {
            $posts->likes()->delete();
            $liked = false;
        } else {
            $posts->likes()->create([
                'user_id' => Auth::user()->id,
                'post_id' => $postId
            ]);
            $liked = true;
        }
        return response()->json([
            'liked' => $liked,
        ],200);
            // return redirect()->back();
    }

    public function countLiked($postId)
    {
        $post = Post::find($postId);
        $countLiked = $post->likes()->count();

        return $countLiked;
        
    }
}
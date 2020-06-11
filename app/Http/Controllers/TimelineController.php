<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

use SplStack;
class TimelineController extends Controller
{

    public function index()
    {
        $posts =  Post::orderBy('created_at', 'desc')->get();

        return view('timeline.index', compact('posts'));
    }

    public function goFriendIndex(Request $id)
    {
        $posts =  Post::where('user_id', $id)->orderBy('created_at', 'desc')->get();

        return view('timeline.index', compact('posts'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class TimelineController extends Controller
{
    public function index()
    {
        $posts = Post::get();
        return view('timeline.index', compact('posts'));
    }
}
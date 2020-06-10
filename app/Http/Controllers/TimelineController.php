<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use SplStack;

class TimelineController extends Controller
{
    public function index()
    {
        $datas = Post::all();
        $posts = new SplStack();
        foreach ($datas as $value) {
            $posts->push($value);
        }

        return view('timeline.index', compact('posts'));
    }
}
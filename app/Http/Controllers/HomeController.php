<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use SplStack;

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
        $datas = Post::all();
        $posts = new SplStack();
        foreach ($datas as $value) {
            $posts->push($value);
        }

        return view('newsfeed.home', compact('posts'));
    }
}
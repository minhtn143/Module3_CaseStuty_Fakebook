<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Services\PostService;
use App\User;

class PostController extends Controller
{
    protected $postService;
    public function __construct(PostService  $postService)
    {
        $this->postService = $postService;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post();
        $post->user_id = Auth::user()->id;
        $post->content = $request->content;
        $post->save();

        return redirect()->back();
    }

    public function comment(Request $request, $postId)
    {
        $post = Post::find($postId);

        if (!$post) {
            return redirect()->route('home');
        }

        // dd($request->input("comment-{$postId}"));
        $comment = Post::create([
            'content' => $request->input("comment-{$postId}"),
            'user_id' => Auth::user()->id
        ]);

        $post->comments()->save($comment);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getAllPosts()
    {
        return back()->with("posts",$this->postService->getAllPosts());
    }

    public function getAllPostsByUserId($id)
    {
        $user = User::find($id);
        $posts = $this->postService->getAllPostsByUserId($id)->sortByDesc("created_at");
        return view('timeline.index',compact("posts","user"));
    }

    public function getLike($postId)
    {
        $posts = Post::find($postId);
        
        $posts->likes()->create([
            'user_id' => Auth::user()->id,
            'post_id' => $postId
            ]);

        return redirect()->back();
    }
}
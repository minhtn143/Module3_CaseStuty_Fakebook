<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Services\PostService;
use App\Photo;
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
        $postId = $post->id;
        $photo = new Photo();
        if ($request->hasFile('input_img')) {
            // dd($request->file('input_img'));
            $image = $request->file('input_img');
            $photo->name = time() . "_" . rand(0, 9999999) . "_" . md5(rand(0, 9999999)) . "." . $image->getClientOriginalExtension();
            $photo->user_id = Auth::id();
            $photo->post_id = $postId;
            $image->storeAs('public/images', $photo->name);
            $photo->save();
            $post = Post::find($postId);
            $post->photo_id = $photo->id;
            $post->save();
        }

        return redirect()->back();
    }

    public function comment(Request $request, $postId)
    {
        //return response()->json(['data' => $request->all()]);
        $post = Post::find($postId);

        if (!$post) {
            return redirect()->route('home');
        }

        $comment = Post::create([
            'content' => $request->content,
            'user_id' => Auth::user()->id
        ]);

        $post->comments()->save($comment);

        return response()->json(['data' => $comment]);
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
        $post = Post::findOrFail($id);

        if ($post->comments->count() > 0) {
            if ($post->comments->each->comments->count() > 0) {
                $post->comments->each->comments->each->delete();
                $post->comments->each->delete();
                $post->delete();
            } else {
                $post->comments->each->delete();
                $post->delete();
            }
        } else {
            $post->delete();
        }

        return redirect()->back();
    }

    public function getAllPosts()
    {
        return back()->with("posts", $this->postService->getAllPosts());
    }

    public function getAllPostsByUserId($id)
    {
        $user = User::find($id);
        $posts = $this->postService->getAllPostsByUserId($id)->sortByDesc("created_at");
        return view('timeline.index', compact("posts", "user"));
    }
}

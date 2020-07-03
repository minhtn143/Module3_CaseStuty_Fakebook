<?php

namespace App\Http\Repositories;

use App\Post;

class PostRepository
{
    protected $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function getAll()
    {
        return $this->post->all();
    }

    public function getAllPostsByUserId($id)
    {
        return $this->post->where("user_id",$id)->get();
    }

    public function delete($postId)
    {
        return $this->post->where("post_id",$postId)->delete();
    }
    
}
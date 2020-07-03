<?php

namespace App\Http\Services;

use App\Http\Repositories\PostRepository;

class PostService
{
    protected $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function getAllPosts()
    {
        return $this->postRepository->getAll();
    }

    public function getAllPostsByUserId($id)
    {
        return $this->postRepository->getAllPostsByUserId($id);
    }
}

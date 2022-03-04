<?php

namespace App\Http\Controllers\Api\Post;


use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Repositories\Post\PostRepositoryInterface;




class PostController extends Controller
{
    private $postRepository;

    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function create(Request $request)
    {
        $response = $this->postRepository->createPost($request);

        if ($response) {
            return response()->json(['message' => 'Post created successfully'], 201);
        } else {
            return response()->json([
                'message' => 'Failed',
            ], 400);
        }
    }

    public function user_feeds()
    {

        $posts = $this->postRepository->getNewsFeed();
        try {
            return response()->json($posts);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Failed',
            ], 400);
        }
    }

  
}

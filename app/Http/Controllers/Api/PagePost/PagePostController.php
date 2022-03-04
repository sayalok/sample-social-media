<?php

namespace App\Http\Controllers\Api\PagePost;


use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Repositories\PagePost\PagePostRepositoryInterface;




class PagePostController extends Controller
{
    private $pagePostRepository;

    public function __construct(PagePostRepositoryInterface $pagePostRepository)
    {
        $this->pagePostRepository = $pagePostRepository;
    }

    public function create(Request $request)
    {
        $response = $this->pagePostRepository->createPagePost($request);

        if ($response) {
            return response()->json(['message' => 'Created successfully'], 201);
        } else {
            return response()->json([
                'message' => 'Failed',
            ], 400);
        }
    }

  

  
}

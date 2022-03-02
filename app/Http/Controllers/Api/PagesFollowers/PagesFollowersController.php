<?php

namespace App\Http\Controllers\Api\PagesFollowers;


use Illuminate\Http\Request;


use App\Http\Controllers\Controller;
use App\Repositories\PagesFollowers\PagesFollowersRepositoryInterface;


class PagesFollowersController extends Controller
{
    private $pagesFollowersRepository;

    public function __construct(PagesFollowersRepositoryInterface $pagesFollowersRepository)
    {
        $this->pagesFollowersRepository = $pagesFollowersRepository;
    }

    public function follow_pages(Request $request)
    {
        $response = $this->pagesFollowersRepository->followerAdd($request);

        if ($response) {
            return response()->json(['message' => 'Successful'], 201);
        } else {
            return response()->json([
                'message' => 'Failed',
            ], 400);
        }
    }

  

  
}

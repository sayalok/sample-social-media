<?php

namespace App\Http\Controllers\Api\PersonFollowers;


use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Repositories\PersonFollowers\PersonFollowersRepositoryInterface;


class PersonFollowersController extends Controller
{
    private $personFollowersRepository;

    public function __construct(PersonFollowersRepositoryInterface $personFollowersRepository)
    {
        $this->personFollowersRepository = $personFollowersRepository;
    }

    public function follow_person(Request $request)
    {
        $response = $this->personFollowersRepository->followerAdd($request);

        if ($response) {
            return response()->json(['message' => 'Successful'], 201);
        } else {
            return response()->json([
                'message' => 'Failed',
            ], 400);
        }
    }

  

  
}

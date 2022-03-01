<?php

namespace App\Http\Controllers\Api\Users;
use App\Http\Controllers\Controller;
use App\Repositories\Users\UsersRepositoryInterface;



class UserController extends Controller
{
    private $userRepository;

    public function __construct(UsersRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function userProfile()
    {
        try {
            return response()->json([
                'message' => 'Success',
                'data' => $this->userRepository->getUserDetails()
            ]);

        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Failed',
            ], 400);
        }
    }

}

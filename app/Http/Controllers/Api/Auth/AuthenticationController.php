<?php

namespace App\Http\Controllers\Api\Auth;


use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;

use App\Http\Controllers\Controller;

use App\Repositories\Authentication\AuthenticationRepositoryInterface;


class AuthenticationController extends Controller
{
    private $authenticationRepository;

    public function __construct(AuthenticationRepositoryInterface $authenticationRepository)
    {
        $this->authenticationRepository = $authenticationRepository;
    }

    public function login(LoginRequest $request)
    {
        $response = $this->authenticationRepository->loginRequestProcess($request);

        if ($response) {
            return $response;
        } else {
            return response()->json([
                'message' => 'Failed',
            ], 400);
        }
    }

    public function register(RegisterRequest $request)
    {

        try {
            $response = $this->authenticationRepository->registerUser($request);
            if ($response) {
                return response()->json([
                    'message' => 'User successfully registered',
                ], 201);
            }else{
                return response()->json([
                    'message' => 'Something went wrong',
                ], 400);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Failed',
            ], 400);
        }
    }

    public function logout() {
        try {
            return response()->json(['message' => 'User successfully signed out']);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Failed',
            ], 400);
        }
    }
}

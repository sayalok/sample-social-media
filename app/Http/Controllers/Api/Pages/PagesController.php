<?php

namespace App\Http\Controllers\Api\Pages;


use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Repositories\Pages\PagesRepositoryInterface;




class PagesController extends Controller
{
    private $pagesRepository;

    public function __construct(PagesRepositoryInterface $pagesRepository)
    {
        $this->pagesRepository = $pagesRepository;
    }

    public function create(Request $request)
    {
        $response = $this->pagesRepository->createPage($request);

        if ($response) {
            return response()->json(['message' => 'Page created successfully'], 201);
        } else {
            return response()->json([
                'message' => 'Failed',
            ], 400);
        }
    }

  

  
}

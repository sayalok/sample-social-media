<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Api\Users\UserController;
use App\Http\Controllers\Api\Pages\PagesController;
use App\Http\Controllers\Api\Auth\AuthenticationController;
use App\Http\Controllers\Api\PagesFollowers\PagesFollowersController;



Route::group(['middleware' => 'api',], function ($router) {
    Route::post('/login', [AuthenticationController::class, 'login']);
    Route::post('/register', [AuthenticationController::class, 'register']); 
});

Route::group(['middleware' => 'auth:api',], function ($router) {
    Route::post('/logout', [AuthenticationController::class, 'logout']);
    Route::get('/user-profile', [UserController::class, 'userProfile']);

    Route::prefix('pages')->group(function()
    {
        Route::post('/create_page', [PagesController::class, 'create']);
        Route::post('/follow', [PagesFollowersController::class, 'follow_pages']);
    });
});


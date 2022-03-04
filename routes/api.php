<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Api\Post\PostController;
use App\Http\Controllers\Api\Users\UserController;
use App\Http\Controllers\Api\Pages\PagesController;
use App\Http\Controllers\Api\PagePost\PagePostController;
use App\Http\Controllers\Api\Auth\AuthenticationController;
use App\Http\Controllers\Api\PagesFollowers\PagesFollowersController;
use App\Http\Controllers\Api\PersonFollowers\PersonFollowersController;



Route::group(['middleware' => 'api',], function ($router) {
    Route::post('/login', [AuthenticationController::class, 'login']);
    Route::post('/register', [AuthenticationController::class, 'register']); 
});

Route::group(['middleware' => 'auth:api',], function ($router) {
    Route::post('/logout', [AuthenticationController::class, 'logout']);
    Route::get('/user-profile', [UserController::class, 'userProfile']);
    
    Route::get('/news-feed', [PostController::class, 'user_feeds']);

    Route::prefix('pages')->group(function()
    {
        Route::post('/create_page', [PagesController::class, 'create']);
        Route::post('/follow_page', [PagesFollowersController::class, 'follow_pages']);
        Route::post('/folow_person', [PersonFollowersController::class, 'follow_person']);
    });

    Route::prefix('post')->group(function()
    {
        Route::post('/create_post', [PostController::class, 'create']);
    });

    Route::prefix('page_post')->group(function()
    {
        Route::post('/create_page_post', [PagePostController::class, 'create']);
    });
});


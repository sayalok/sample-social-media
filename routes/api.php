<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Api\Users\UserController;
use App\Http\Controllers\Api\Auth\AuthenticationController;



Route::group(['middleware' => 'api',], function ($router) {
    Route::post('/login', [AuthenticationController::class, 'login']);
    Route::post('/register', [AuthenticationController::class, 'register']); 
});

Route::group(['middleware' => 'auth:api',], function ($router) {
    Route::post('/logout', [AuthenticationController::class, 'logout']);
    Route::get('/user-profile', [UserController::class, 'userProfile']);
});


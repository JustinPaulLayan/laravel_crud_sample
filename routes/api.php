<?php

use Illuminate\Http\Request;
use App\Http\Controllers\API\PostController;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('getPosts', [PostController::class, 'index']);

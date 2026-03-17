<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('welcome');
});


// С middleware — изменение данных возможно только для админа
Route::middleware('check.admin')->group(function() {
    Route::resource('posts', PostController::class)->only
    (['create', 'store', 'edit', 'update', 'destroy']);
});

// Без middleware — просмотр доступен всем

Route::resource('posts', PostController::class)->only(['index', 'show']);

// Route::resource('posts', PostController::class)->middleware(['check.admin' =>
//     ['create', 'store', 'edit', 'update', 'destroy']]); 2 способ

Route::resource('categories', CategoryController::class);

Route::get('/users/{user}/latest-posts', [UserController::class, 'userLatestPosts']);

Route::resource('users', UserController::class);

Route::get('/users/{user}/posts', [UserController::class, 'userPosts']);




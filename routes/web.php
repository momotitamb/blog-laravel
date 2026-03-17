<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function() {
    Route::resource('posts', PostController::class)->only(['create', 'store', 'edit', 'update', 'destroy']);
});

Route::resource('posts', PostController::class)->only(['index', 'show']);

// Route::resource('posts', PostController::class)->middleware(['check.admin' =>
//     ['create', 'store', 'edit', 'update', 'destroy']]); 2 способ

Route::resource('categories', CategoryController::class);

Route::get('/users/{user}/latest-posts', [UserController::class, 'userLatestPosts']);

Route::resource('users', UserController::class);

Route::get('/users/{user}/posts', [UserController::class, 'userPosts']);


require __DIR__.'/auth.php';

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/posts/{post}', function (App\Models\Post $post) {
    return view('posts.show', ['post' => $post]);
})->name('posts.show');

require __DIR__.'/auth.php';

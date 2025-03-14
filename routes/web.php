<?php

use App\Http\Controllers\PostController;
use App\Livewire\Pages\Home;
use App\Livewire\Pages\Posts;
use App\Livewire\Pages\PostShow;
use Illuminate\Support\Facades\Route;
use App\Livewire\Pages\Contact;

Route::get('/', Home::class)->name('home');
//Route::view('/', 'welcome')->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

    Route::middleware(['auth'])->group(function () {
        // Redirect dashboard to posts index
        Route::get('/dashboard', function () {
            return redirect()->route('posts.index');
        })->name('dashboard');

        // Posts routes
        Route::resource('posts', PostController::class);
    });

Route::middleware(['auth'])->group(function () {
    Route::post('/posts/{post}/favorite', [PostController::class, 'toggleFavorite'])
        ->name('posts.favorite');
});



Route::get('/posts', Posts::class)->name('posts.index');
Route::get('/posts/{post:slug}', PostShow::class)->name('posts.show');
Route::get('/contact', Contact::class)->name('contact');

//Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
//Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
//Route::get('/contact', [ContactController::class, 'index'])->name('contact');

require __DIR__.'/auth.php';

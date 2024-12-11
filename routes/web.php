<?php

use App\Http\Controllers\FirebaseController;
use App\Http\Controllers\StreamController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;
use App\Livewire\CreatePost;
use App\Livewire\HomePage;
use App\Models\Post;

Route::post('/login/google/callback', FirebaseController::class)->name('login.google.callback');

Route::get('/', HomePage::class);

Route::middleware('auth')->group(function() {
    Route::get('/home', CreatePost::class);
    Route::get('/post/{post}', fn (Post $post) => view('detail', ['post' => $post]))->name('post.detail');
    Route::post('/chat/stream', StreamController::class)->name('stream');

    // Admin routes
    Route::middleware([AdminMiddleware::class])->prefix('admin')->group(function () {
        
    });
});

require __DIR__ . '/auth.php';

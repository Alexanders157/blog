<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::prefix('posts')
    ->group(function () {

        Route::get('/all', [PostController::class, 'index'])->name('all');

        Route::get('/{post}', [PostController::class, 'show'])->name('get-post');
        Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('edit-post');

        Route::get('/create', [PostController::class, 'create'])->name('create-post');
        Route::post('/posts', [PostController::class, 'store'])->name('store-post');

})->name('posts');

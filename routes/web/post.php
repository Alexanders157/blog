<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;



Route::middleware(['auth'])->prefix('posts')
    ->name('posts/')
    ->group(static function () {

        Route::post('store', [PostController::class, 'store'])->name('store');

        Route::get('create', [PostController::class, 'create'])->name('create');
        Route::get('all', [PostController::class, 'index'])->name('all');

        Route::get('{post}', [PostController::class, 'show'])->name('get');
        Route::get('{post}/edit', [PostController::class, 'edit'])->name('edit');

        Route::put('{post}', [PostController::class, 'update'])->name('update');

        Route::post('{post}/comments', [CommentController::class, 'store'])->name('comment-store');
});



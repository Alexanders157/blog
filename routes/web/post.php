<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;



Route::middleware(['auth'])->prefix('posts')
    ->name('posts.')
    ->group(static function () {

        Route::post('store', [PostController::class, 'store'])->name('store');

        Route::get('create', [PostController::class, 'create'])->name('create');
        Route::get('all', [PostController::class, 'index'])->name('index');

        Route::get('{post}', [PostController::class, 'show'])->name('show');
        Route::get('{post}/edit', [PostController::class, 'edit'])->name('edit');

        Route::put('{post}', [PostController::class, 'update'])->name('update');
        Route::delete('{post}', [PostController::class, 'destroy'])->name('destroy');

        Route::post('{post}/comments', [CommentController::class, 'store'])->name('comments.store');
    });



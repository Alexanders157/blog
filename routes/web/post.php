<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::prefix('posts')
    ->name('posts')
    ->group(static function () {
        Route::get('/create', [PostController::class, 'create'])->name('create');
        Route::get('/all', [PostController::class, 'index'])->name('all');

        Route::get('/{post}', [PostController::class, 'show'])->name('get');
        Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('edit');

        Route::post('/store', [PostController::class, 'store'])->name('store');
});

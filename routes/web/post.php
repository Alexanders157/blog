<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::prefix('post')
    ->group(function () {
        //ДЗ
        Route::get('{post}', [PostController::class, 'show'])
            ->name('get-post');

        Route::get('all', [PostController::class, 'index'])
            ->name('all');

        Route::get('create', static function () {
            return view('createpost');
        });
})->name('post');

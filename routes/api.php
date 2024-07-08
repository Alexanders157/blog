<?php

use App\Http\Controllers\Api\ApiPostController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')
    ->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/get-post', [ApiPostController::class, 'get'])->name('api-post');
//Route::post('/posts', [PostController::class, 'store']);
Route::put('/posts/{post}', [PostController::class, 'update']);
Route::get('/posts2', [ApiController::class, 'index']);
Route::get('/posts3', [ApiController::class, 'index2']);
Route::post('/posts3', [ApiController::class, 'store']);
Route::get('posts3/{post}', [ApiController::class, 'show']);
Route::delete('posts3/{post}', [ApiController::class, 'destroy']);

<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\PostController;
use App\Models\Post;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', static function () {
    return view('dashboard', ['user' => User::find(1)]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/post/create', [PostController::class, 'create'])->name('create');

Route::get('/posts', [PostController::class, 'index']);

Route::get('post/{post}', [PostController::class, 'show'])->name('show');

Route::get('post/{post}/edit', [PostController::class, 'edit'])->name('edit');

Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');

Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');

require __DIR__ . '/auth.php';

<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Libraries\Cat;


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

Route::get('/dashboard', function () {
    return view('dashboard', ['user' => User::find(1)]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('posts', function () {
    return view('allposts');
})->name('posts');

Route::get('/post/create', function () {
    return view('createpost');
});

Route::post('/create', [\App\Http\Controllers\PostController::class, 'store'])->name('create');

Route::get('/post', function () {
    return view('post', ['cat' => new \App\Libraries\Cat('Jon', 'Red Cat')]);
});
Route::post('/posts', 'PostController@store');
Route::get('/posts/{id}/edit', 'PostController@edit');
Route::get('/posts/{id}', 'PostController@show');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

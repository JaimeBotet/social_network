<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfileController;

use Laravel\Jetstream\Rules\Role;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [PostsController::class, 'showPosts'])->name('dashboard');


Route::get('/', function () {
    return redirect('/dashboard');
});


Route::get('/comments/{id}', [PostsController::class, 'showComments']);
Route::get('/post/{id}/edit', [PostsController::class, 'edit']);
Route::get('/getComments/{id}', [PostsController::class, 'getComments']);


//Author dashboard"""
Route::get('/profile/{authorId}', [ProfileController::class, 'show']);



//These are all tests to try the controller functions
Route::get('/test', function () {
    $user = User::find(1);
    return $user;
});
Route::get('/posts/{id}', [PostsController::class, 'show']);
Route::get('/posts/{id}/edit', [PostsController::class, 'edit']);
Route::get('/posts', [PostsController::class, 'showAll']);
Route::get('/posts/{id}/comments', [PostsController::class, 'showComments']);

Route::post('/changeLike', [LikeController::class, 'update']);
Route::get('/likes/{postId}', [LikeController::class, 'readLikes']);

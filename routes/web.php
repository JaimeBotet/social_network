<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CommentsController;

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

Route::get('/', function () {
    //if user is authenticated go to dashboard, if not go to login.
    $auth = true;
    if ($auth) {
        // return view('/dashboard');
    } else return view('auth.login');

    return view('auth.login');
});


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [PostsController::class, 'showPosts'])->name('dashboard');

Route::get('/comments/{id}', [PostsController::class, 'showComments']);
Route::get('/getComments/{id}', [PostsController::class, 'getComments']);






//These are all tests to try the controller functions
Route::get('/test', function () {
    $user = User::find(1);
    return $user;
});
Route::get('/posts/{id}', [PostsController::class, 'show']);
Route::get('/posts/{id}/edit', [PostsController::class, 'edit']);
Route::get('/posts', [PostsController::class, 'showAll']);
Route::get('/posts/{id}/comments', [PostsController::class, 'showComments']);

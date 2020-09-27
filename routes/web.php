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
    return view('auth.login');
});

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     $post1 = new stdClass();
//     $post1->image = 'https://vignette.wikia.nocookie.net/leagueoflegends/images/9/90/Poppy_OriginalCentered.jpg/revision/latest?cb=20180414203503';
//     $post1->content = 'Poppy is the best champion in LOL';
//     $post1->author = 'Tristana';

// $post2 = new stdClass();
// $post2->image = 'https://vignette.wikia.nocookie.net/leagueoflegends/images/6/67/Tristana_OriginalCentered.jpg/revision/latest/scale-to-width-down/340?cb=20180414203651';
// $post2->content = 'La que nace artillera de Bandle, muere artillera de Bandle';
// $post2->author = 'Tristana';

// $posts = [
//     $post1,
//     $post2
// ];
//     return view('dashboard')->with('posts', $posts);
// })->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [PostsController::class, 'showAll'])->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/posts/{id}/comments', [PostsController::class, 'showComments'])->name('dashboard');


//These are all tests to try the controller functions
Route::get('/test', function () {
    $user = User::find(1);
    return $user;
});

Route::get('/posts/{id}', [PostsController::class, 'show']);
Route::get('/posts/{id}/edit', [PostsController::class, 'edit']);
Route::get('/posts', [PostsController::class, 'showAll']);

Route::get('/posts/{id}/comments', [PostsController::class, 'showComments']);

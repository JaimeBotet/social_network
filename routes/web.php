<?php

use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    $post = new stdClass();
    $post->image= 'https://vignette.wikia.nocookie.net/leagueoflegends/images/9/90/Poppy_OriginalCentered.jpg/revision/latest?cb=20180414203503';
    $post->content= 'Poppy is the best champion in LOL';
    $post->author = 'Tristana';
    $posts=[
        $post
    ];
    return view('dashboard')->with('posts', $posts);
})->name('dashboard');

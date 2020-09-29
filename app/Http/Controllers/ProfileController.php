<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;

class ProfileController extends Controller
{
    public function show($id)
    {
        $user = User::find($id);
        $posts = Post::where('author', $id)->get();
        $posts_array = array();

        //We turn the collection into an array
        foreach ($posts as $post) {
            array_push($posts_array, $post);
        }

        if (empty($posts_array)) return view('profile')->with('profile', $user);
        else return view('profile')->with(['profile' => $user, 'posts' => $posts]);;
    }
}

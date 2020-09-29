<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        Post::create(["author" => "user", "post_img" => "my_img", "content" => "Lorem ipsum"]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post;
        $post->author_id = $request->user_id;
        $post->post_img = $request->img;
        $post->content = $request->content;
        $post->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts = Post::all();
        // foreach ($posts as $post) {
        //     if ($post->id == $id) echo $post->content;
        // }
        return view('dashboard')->with('posts', $posts);
    }

    //This function displays posts and comments
    public function showPosts()
    {
        $user = Auth::user();
        $posts_array = array();

        //We push in the posts_array the posts of our friends
        $friends = User::find($user->id)->friends;
        foreach ($friends as $friend) {
            $friend_name = User::where("id", $friend->friend_id)->pluck('name');
            $friend->name = $friend_name[0];

            $friend_posts = Post::where('author', $friend->friend_id)->get();
            foreach ($friend_posts as $post) {
                $post_author = User::where("id", $post->author)->pluck('name');
                $post->author_name = $post_author[0];
                array_push($posts_array, $post);
            }
        }

        //We push in the posts_array the posts created by the logged user
        $posts = Post::where('author', $user->id)->get();
        foreach ($posts as $post) {
            $post_author = User::where("id", $post->author)->first();
            $post->author_name = $post_author->name;
            $post->profile_photo_path = $post_author->profile_photo_path;
            array_push($posts_array, $post);
        }

        // echo "<pre>";
        // print_r($posts_array);
        // echo "</pre>";

        return view('dashboard')->with(['posts' => $posts_array, 'user' => $user, 'friends' => $friends]);
    }

    public function showComments($id)
    {
        $comments = Post::find($id)->comments;
        $comments_array = array();

        foreach ($comments as $comment) {
            // echo $comment->content . "<br>";
            array_push($comments_array, $comment);
        }

        if (empty($comments_array)) {
            return view('comments');
        } else {
            return view('comments')->with('comments', $comments);
        }
    }

    public function getComments($id)
    {
        $comments = Post::find($id)->comments;
        $comments_array = array();

        foreach ($comments as $comment) {
            array_push($comments_array, $comment);
        }

        echo $comments;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $post = Post::find($id);
        //Now we show the form with the content of this post
        //with this echo we are just showing the post raw, no form
        //TODO

        return view('edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $post = $request;
        $post->save();
    }

    //Wont be used in our application, but might be useful
    public function bulkUpdate(Request $request, $field, $value)
    {
        //Here we are just searching for 1 criteria, where the field=$field takes value=$value
        Post::where($field, $value)->update([$field => $request->$field]);
        //For more restrictions, we add more "where" clauses, in this example we will apply the update to our query and only to the element that has id=1
        // Post::where($field,$value)->where("id", 1)->update([$field => $request->$field]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post = Post::find($id);
        $post->delete();
    }
}

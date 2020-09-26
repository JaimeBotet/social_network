<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

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
        foreach ($posts as $post) {
            if ($post->id == $id) echo $post->content;
        }
    }

    public function showAll()
    {
        // $user = $_SESSION['user'];
        $user = 1;
        $posts = Post::where('author', $user)->get();

        return view('dashboard')->with('posts', $posts);
    }

    public function showComments($id)
    {
        // $user = $_SESSION['user'];
        $user = 1;
        $posts = Post::where('author', $user)->get();
        $comments = Post::find($id)->comments;

        return view('dashboard')->with(['posts' => $posts, 'comments' => $comments]);
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
        echo $post;
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

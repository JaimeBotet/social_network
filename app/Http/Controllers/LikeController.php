<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;

class LikeController extends Controller
{
    public function getLikes($postId) {
        $response = Like::where(['post_id'=> $postId, 'value'=>'1'])->count();
        return $response;
    }
    public function getDislikes($postId) {
        $response = Like::where(['post_id'=> $postId, 'value'=>'0'])->count();
        return $response;
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request) {
        //I need the user ID
        $author_id = $request->author_id;
        //I need the Post ID
        $post_id = $request->post_id;
        //I need the Value
        $value = (int) $request->value;

        //First delete the possible register
        $whereMatch=['author_id'=> $author_id, 'post_id' => $post_id];
        Like::where($whereMatch)->delete();
        //Insert a new register of like
        $like = new Like;

        $like->author_id = $author_id;
        $like->post_id = $post_id;
        $like->value = $value;

        $like->save();
        return "[]";
    }
}

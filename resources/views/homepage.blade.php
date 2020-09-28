@isset($friends)
<div class='friends_container' id='friendsContainer'>
    <div><input type='search' placeholder='Search friends'></div>
</div>
@endisset
@isset($posts)
<div class='posts py-12'>
    @foreach($posts as $post)
    <div class="post post_id_{{$post->id}}' max-w-7xl mx-auto sm:px-6 lg:px-8" data-post='{{$post->id}}'>
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mb-5">
            <div class="post_image_container">
                @isset($post->post_img)
                <img class='post_image ' src='{{$post->post_img}}'>
                @endisset
            </div>
            <div class="post_author_container my-2 mx-5 flex justify-end">
                @isset($post->author)
                <p><strong>Author: </strong><a href="SomeData">{{$post->author_name}}</a></p>
                @endisset
            </div>
            <div class="post_content_container my-2 mx-5 flex justify-start">
                @isset($post->content)
                <p class='post_content m-8'>{{$post->content}}</p>
                @endisset
            </div>
            <div class="post_social_container flex justify-between">
                <div class="post_comments_button">
                    <!-- <a href="/comments/{{$post->id}}"> -->
                    <div class="bandle_button" data-post='{{$post->id}}' data-src='{{ url("/getComments/" . $post->id) }}'>Comments</div>
                    <!-- </a> -->
                </div>
                <div class="post_likes_button flex justify-around">
                    <div id="post_like_{{$post->id}}" class="post_like">
                        <img  class="post_social_image" src="assets/img/like.png">
                    </div>
                    <div id="post_dislike_{{$post->id}}" class="post_dislike">
                        <img class="post_social_image" src="assets/img/dislike.png">
                    </div>
                </div>
            </div>
            <div class="post_comment_container" id='comment_container_id_{{$post->id}}'>
            </div>
            @isset($post->id)
                <input type="hidden" name="postId" value="{{$post->id}}">
            @endisset
            @isset($post->author)
                <input type="hidden" name="postAuthor" value="{{$post->author}}">
            @endisset
        </div>
    </div>
    @endforeach
</div>
@endisset
@isset($friends)
<div id="friendsButton">
    <img src='{{asset("assets/img/friends.png")}}'>
</div>
@endisset
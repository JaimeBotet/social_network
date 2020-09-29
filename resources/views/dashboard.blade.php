@extends('homepage')

@section('header')
<h2 class="font-semibold text-xl text-gray-800 leading-tight">
    Welcome to your {{ __('Dashboard') }} {{$user->name}}
</h2>
@endsection

@section('content')


<div class='friends_container' id='friendsContainer'>
    <div><input type='search' placeholder='Search friends'></div>
    @foreach($friends as $friend)
    <p class="friend_li" data-friend="{{$friend->friend_id}}"><a href="/profile/{{$friend->friend_id}}">{{$friend->name}}</a></p>
    @endforeach
</div>


<div class='posts py-12'>

    <form class="max-w-full mx-auto my-2 sm:px-6 lg:px-8 flex justify-center" action="/post/store" method="POST">
        <div class="w-3/4 bg-white overflow-hidden shadow-xl sm:rounded-lg mb-5 flex items-end border-b border-teal-500 py-2 flex flex-col content-center ">
        @csrf
            <textarea class=" appearance-none bg-transparent border-none w-full p-5 text-gray-700 leading-tight focus:outline-none" name="content" id="" cols="30" rows="5" placeholder="What are you thinking?"></textarea>
            <input class="underline appearance-none p-5 border-none w-full text-gray-700  leading-tight focus:outline-none" type="text" name="post_img" placeholder="http://putYourUrlImage.com/nameImage.jpg">
            <div class="flex -flex-row">
                <input type="submit" class="flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-1 px-2 rounded mx-1" value="Publish">
                <input type="reset" class="flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-1 px-2 rounded mx-1" value="Cancel">
            </div>
        </div>
    </form>

    @isset($posts)
    @foreach($posts as $post)
    <div class="post post_id_{{$post->id}}' max-w-7xl mx-auto sm:px-6 lg:px-8" data-post='{{$post->id}}'>
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mb-5">
            <div class="post_header_container m-4 flex justify-between">
            @isset($post->author)
                <div class="post_author_container flex row items-center">
                    @if($post->profile_photo_path != null)
                        <img src='{{ asset("/storage/" . $post->profile_photo_path) }}' class="profile_image mr-2">
                    @endif
                    <p><a href="SomeData">{{$post->author_name}}</a></p>
                </div>
                <div class="post_likes_container flex row items-center">
                    <p class="show_likes show_likes_likes" id='show_likes_{{$post->id}}' data-src='{{url("likes/".$post->id) }}'></p>
                    <p class="show_likes show_likes_dislikes" id='show_dislikes_{{$post->id}}' data-src='{{url("dislikes/".$post->id) }}'></p>
                </div>
            @endisset
            </div>
            <div class="post_image_container">
                @isset($post->post_img)
                <img class='post_image ' src='{{$post->post_img}}'>
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
                    <div id="post_like_{{$post->id}}" class="post_like likesButton" data-postID='{{ $post->id }}' data-userID='{{ $user->id }}' data-value='1' data-src='{{url("/changeLike")}}'>
                        <img class="post_social_image" src="assets/img/like.png" data-postID='{{ $post->id }}' data-userID='{{ $user->id }}' data-value='1' data-src='{{url("/changeLike")}}'>
                    </div>
                    <div id="post_dislike_{{$post->id}}" class="post_dislike likesButton" data-postID='{{ $post->id }}' data-userID='{{ $user->id }}' data-value='0' data-src='{{url("/changeLike")}}'>
                        <img class="post_social_image" src="assets/img/dislike.png" data-postID='{{ $post->id }}' data-userID='{{ $user->id }}' data-value='0' data-src='{{url("/changeLike")}}'>
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
            <br>


            @if($post->author==$user->id)
            <div class="flex justify-center h-16 self-center">
                <div class="btn edit_btn">
                    <button class="bg-transparent hover:bg-orange-700 hover:bg-opacity-50 text-orange-700 text-opacity-50 font-semibold hover:text-white py-2 px-4 hover:border-transparent rounded">
                        <a href="/post/{{$post->id}}/edit">Edit</a>
                    </button>
                </div>
                <div class="btn">
                    <button class="bg-transparent hover:bg-orange-700 hover:bg-opacity-50 text-orange-700 text-opacity-50 font-semibold hover:text-white py-2 px-4 hover:border-transparent rounded">
                        <a href="/post/{{$post->id}}/delete">Delete</a>
                    </button>
                </div>
            </div>
            @endif

        </div>
    </div>
    @endforeach
    @endisset
</div>

<div id="friendsButton">
    <img src='{{asset("assets/img/friends.png")}}'>
</div>

@endsection
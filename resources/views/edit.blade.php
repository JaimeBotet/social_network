<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class='posts py-12'>
        <div class="post max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mb-5">
                @isset($post->post_img)
                <img class='post_image ' src='{{$post->post_img}}'>

                @endisset
                @isset($post->content)
                <p class='post_content m-8'>{{$post->content}}</p>
                @endisset
                @isset($post->id)
                <p class='post_content m-2 mr-5 text-right'>Post number: {{$post->id}}</p>
                @endisset
                @isset($post->author)
                <p class='post_content m-2 mr-5 text-right'>Post author: {{$post->author}}</p>
                @endisset
                <br>
                @if(@isset($comments))
                <div class="comments_button">
                    <button><a href="/dashboard">Hide Comments</a></button>
                </div>
                <div class="comments">
                    @foreach($comments as $comment)
                    <div class="comment">
                        <p>{{$comment->content}}</p>
                    </div>
                    @endforeach
                </div>
                @else
                <div class="comments_button">
                    <button><a href="/posts/{{$post->id}}/comments">Show Comments</a></button>
                </div>
                @endif

            </div>
        </div>
    </div>

</x-app-layout>
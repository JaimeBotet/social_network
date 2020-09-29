<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class='posts py-12'>
        <div class="post w-3/4 mx-auto sm:px-6 lg:px-8 bg-white overflow-hidden shadow-xl sm:rounded-lg mb-5">
            <form action="/post/{{$post->id}}/update" method="POST" class="flex flex-col content-center justify-center">
                @csrf
                @isset($post->post_img)
                <img class='post_image' src='{{$post->post_img}}'>
                @endisset
                <label for="post_content" class='mt-2'>Content</label>
                <textarea name="content" id="" cols="30" rows="5" class="appearance-none bg-transparent border-none w-full p-5 text-gray-700 leading-tight focus:outline-none">{{$post->content}}</textarea>
                <label for="post_img"> New Image: </label>
                <input type="text" name="post_img" class="underline appearance-none p-5 border-none w-full text-gray-700  leading-tight focus:outline-none" value="{{$post->post_img}}" placeholder="http://putYourUrlImage.com/nameImage.jpg">
                @isset($post->id)
                <p class='post_content mr-5 text-right'>Post number: {{$post->id}}</p>
                @endisset
                @isset($post->author)
                <p class='post_content mr-5 text-right'>Post author: {{$post->author}}</p>
                @endisset
                <div class="flex flex-col justify-center items-center m-4">
                    <input type="submit" value="Update" class="bandle_button w-3/4">
                    <button class="bandle_button w-3/4 my-2"><a href="/dashboard" >Cancel</a></button>
                <div>
            </form>
        </div>
    </div>

</x-app-layout>
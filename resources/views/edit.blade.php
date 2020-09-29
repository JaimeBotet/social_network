<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class='posts py-12'>
        <div class="post max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mb-5">
                <form action="/post/{{$post->id}}/update" method="POST">
                    @csrf
                    @isset($post->post_img)
                    <img class='post_image' src='{{$post->post_img}}'>
                    @endisset
                    <label for="post_img"> New Image: </label>
                    <input type="text" name="post_img" class="border-solid border-1 border-gray-600">
                    <br>

                    <label for="post_content">Content</label>
                    <textarea name="content" id="" cols="30" rows="10" class="post_content m-8" style="border: 1px solid black;">{{$post->content}}</textarea>
                    <br>

                    @isset($post->id)
                    <p class='post_content m-2 mr-5 text-right'>Post number: {{$post->id}}</p>
                    @endisset
                    @isset($post->author)
                    <p class='post_content m-2 mr-5 text-right'>Post author: {{$post->author}}</p>
                    @endisset
                    <br>
                    <input type="submit" value="Update">
                </form>
                <button><a href="/dashboard">Cancel</a></button>
            </div>
        </div>
    </div>

</x-app-layout>
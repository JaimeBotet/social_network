@isset($posts)
<div class='posts py-12'>
    @foreach($posts as $post)
        <div class="post max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            @isset($post->image)
                <img class='post_image ' src='{{$post->image}}'>
            @endisset
            @isset($post->content)
                <p class='post_content m-8'>{{$post->content}}</p>
            @endisset
            @isset($post->author)
                <p class='post_content m-2 mr-5 text-right'>{{$post->author}}</p>
            @endisset
            </div>
        </div>
    @endforeach
</div>
@endisset
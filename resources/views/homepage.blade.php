@isset($posts)
<div class='posts py-12'>
    @foreach($posts as $post)
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
            <div class="comments_button">
                <button><a href="/comments/{{$post->id}}">Comments</a></button>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endisset
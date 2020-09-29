@extends('homepage')

@section('header')
<h2 class="font-semibold text-xl text-gray-800 leading-tight">
    Welcome to {{$profile->name}}'s Profile!
</h2>
@endsection


@section('content')
<div class='posts py-12'>

    <div class="post ' max-w-7xl mx-auto sm:px-6 lg:px-8" data-profile='{{$profile->id}}'>
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mb-5">

            <!-- We show the profile photo  -->
            <div class="post_image_container">
                <img class='profile_image ' src='{{$profile->profile_photo_path}}' alt="{{$profile->name}}\'s Profile Picture">

            </div>

            <!-- We show the profile name  -->
            <div class="profile_name_container my-2 mx-5 flex justify-start">
                <p><strong>Name: </strong>{{$profile->name}}</p>
            </div>

            <!-- We show the profile email  -->
            <div class="profile_email_container my-2 mx-5 flex justify-start">
                <p><strong>Email Address: </strong>{{$profile->email}}</p>
            </div>

            <!-- We show the profile description  -->
            <div class="profile_description_container my-2 mx-5 flex justify-start">
                <p><strong>User Description: </strong>{{$profile->description}}</p>
            </div>

            <!-- We show the profile posts  -->
            <div class="profile_posts_container my-2 mx-5 flex justify-start">
                <p><strong>Posts: </strong></p>
                <div class='posts py-12'>
                    @if(@isset($posts))
                    @foreach($posts as $post)
                    <div class="post post_id_{{$post->id}}' max-w-7xl mx-auto sm:px-6 lg:px-8" data-post='{{$post->id}}'>
                        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mb-5">
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
                        </div>
                    </div>
                    @endforeach
                    @else
                    <p>No Posts 😞...</p>
                    @endif
                </div>

            </div>
        </div>
    </div>

</div>




@endsection
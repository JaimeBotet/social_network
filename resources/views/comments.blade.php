<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class='posts py-12'>
        <div class="post max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mb-5">

                @if(@isset($comments))
                <div class='posts py-12'>
                    @foreach($comments as $comment)
                    <div class="post max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <p>Comment id: {{$comment->id}}</p>
                        <p>{{$comment->content}}</p>
                        <br>
                    </div>
                    @endforeach
                </div>
                @else
                <div class='posts py-12'>
                    <div class="post max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <p>No comments</p>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>

</x-app-layout>
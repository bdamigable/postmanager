@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12">
            <div class="p-6">
                <h1 class="text-2xl font-medium mb-1">{{ $user->name }}</h1>
                <p>Posted {{ $posts->count() }} {{ Str::plural('topic', $posts->count()) }}
                and received {{ $user->receivedLikes->count() }} {{ Str::plural('like', $user->receivedLikes->count()) }}</p>
            </div>
            <div class="bg-white p-6 rounded-lg">
                @if ($posts->count())
                    @foreach ($posts as $post)
                        <div class="mb-4">
                            <a href="{{ route('users.posts', $post->user) }}" class="font-bold">{{ $post->user->name }}</a>
                            <span class="text-gray-600 text sm">{{ $post->created_at->diffForHumans() }}</span>
                            <p class="mb-2">{{ \Illuminate\Support\Str::limit($post->body, 50, '... ') }}
                                <a href="{{ route('posts.show', $post->id) }}" class="text-blue-700 font-semibold">Read more</a>
                            </p>
                            
                            
                            
                        </div>     
                    @endforeach
                {{ $posts->links() }}

                @else 
                        <p>{{ $user->name }} has not posted yet.</p>

                @endif
            </div>            
        </div>
    </div>
@endsection
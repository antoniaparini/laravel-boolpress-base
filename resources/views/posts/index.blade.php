@extends('layouts.main')

@section('content')

    <div class="container">

        @if (session('post-deleted'))
            <div class="alert alert-success">
                <p>Post "{{ session('post-deleted') }}" has been deleted!</p>
            </div>
        @endif

        <h1 class="mb-3">Blog Archieve</h1>

        @forelse ($posts as $post)
            <article class="mb-3">
                <h2>{{ $post->title }}</h2>
                <h5>{{ $post->created_at->format('d/m/Y') }}</h5> {{-- formattiamo la data --}}
                <p>
                    {{ $post->body }}
                </p>
                <a href="{{ route('posts.show', $post->slug) }}">Read More</a>
            </article>
        @empty {{-- se non abbiamo nulla, sfruttiamo la parte sotto --}}
            <p>No post found. Go and <a href="{{ route('posts.create') }}">create a new one</a>!</p>
        @endforelse
        {{ $posts->links() }}
    </div>

    
@endsection
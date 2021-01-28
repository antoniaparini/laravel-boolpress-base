@extends('layouts.main')

@section('content')

    <div class="container">
        <h1 class="mb-3">{{ $post->title }}</h1>
        <div>Last Update: {{ $post->update_at }}</div>

        <div>Post Status:{{ $post->infoPost->post_status }}</div>
        <div>Post Status:{{ $post->infoPost->comment_status }}</div>

        <div class="actions mt-2 mb-5">
            <a class="btn btn-primary" href="{{ route('posts.edit', $post->slug) }}">Edit</a>
            <form class="d-inline" action="{{ route('posts.destroy', $post->id) }}" method="POST">
                @csrf
                @method('DELETE')

                <input class="btn btn-danger" type="submit" value="Delete">
            </form>
        </div>

        {{-- TAGS --}}

        <section class="tags">
            <h4>TAGS</h4>
            @forelse ($post->tags as $tag)
                <span class="badge badge-primary">{{ $tag->name }}</span>
            @empty
                <p>No actual Tags for this post.</p>
            @endempty
        </section>

        @if (!empty($post->img_path))
            <img src="{{ asset('storage/' . $post->img_path) }}" alt="{{ $post->title }}">
            
        @else
            <img src="{{ asset('img/no_img.png') }}" alt="no img available">
        @endif

        <div class="text mb-5 mt-5">
            {{ $post->body }}            
        </div>

        <ul class="comments">
            @foreach ($post->comments as $comment)
                <li class="mb-4">
                    <div class="date"> {{ $comment->created_at->diffForHumans() }} </div>
                    <p class="text"> {{ $comment->text }} </p>
                    <h6> {{ $comment->author }} </h6>
                </li>                
            @endforeach
        </ul>
    </div>
    
@endsection
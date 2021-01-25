@extends('layouts.main')

@section('content')
<div class="container mb-5">
    <h1>BLOG ARCHIVE</h1>

    @forelse ($posts as $post)
    <article class="mb-5">
        <h2>{{ $post->title }}</h2>
        <h5>{{ $post->created_at->format('d/m/Y') }}</h5>

        <p>{{ $posts->body }}</p>
        <a href="#">Read More</a>

    </article>
        
    @empty
        <p>No post found. Go and <a href="#">create a new one.</a></p>
    @endforelse
    
    
</div>
@endsection
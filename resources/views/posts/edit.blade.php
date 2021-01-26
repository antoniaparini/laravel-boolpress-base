@extends('layouts.main')

@section('content')

    <div class="container">
        <h1 class="mb-3">Edit: {{ $post->title }}</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>            
        @endif

        <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title" id="title" value="{{ old('title', $post->title) }}">
            </div>

            <div class="form-group">
                <label for="body">Description</label>
                <textarea class="form-control" name="body" id="body">{{ old('body', $post->body) }}</textarea>
            </div>
            
            <div class="form-group">
                <label for="img_path">Posted Image</label>
                @isset($post->img_path)
                    <div class="wrap-image">
                        <img width="200" src="{{ asset('storage/' . $post->img_path) }}" alt="{{ $post->title }}">
                    </div>
                    <h6>Change Old Image:</h6>
                @endisset
                <input class="form-control" type="file" name="img_path" id="img_path" accept="image/*">
            </div>
            
            <div class="form-group">
                <input class="btn btn-primary" type="submit" value="Update Post">
            </div>
            
            
        </form>
    </div>
    
@endsection
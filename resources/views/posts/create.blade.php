@extends('layouts.main')

@section('content')

    <div class="container">
        <h1 class="mb-3">Create New Post</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>            
        @endif

        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}">
            </div>

            <div class="form-group">
                <label for="body">Description</label>
                <textarea class="form-control" name="body" id="body">{{ old('body') }}</textarea>
            </div>
            
            <div class="form-group">
                <label for="img_path">Post Image</label>
                <input class="form-control" type="file" name="img_path" id="img_path" accept="image/*">
            </div>

            {{-- STATUS --}}

            <div class="form-group">
                <label for="comment_status">Comment Status:</label>
                <select name="comment_status" id="comment_status">
                    <option value="open" {{ old('comment_status') == 'open' ? 'selected' : ''}}>Open</option>
                    <option value="closed" {{ old('comment_status') == 'closed' ? 'selected' : ''}}>Closed</option>
                    <option value="private" {{ old('comment_status') == 'private' ? 'selected' : ''}}>Private</option>
                </select>
            </div>

            <div class="form-group">
                <label for="post_status">Post Status:</label>
                <select name="post_status" id="post_status">
                    <option value="public" {{ old('post_status') == 'public' ? 'selected' : '' }}>Public</option>
                    <option value="private" {{ old('post_status') == 'private' ? 'selected' : '' }}>Private</option>
                    <option value="draft" {{ old('post_status') == 'draft' ? 'selected' : '' }}>Draft</option>
                </select>
            </div>

            {{-- TAGS --}}
            <div class="form-group">
                <h3>Lista Tag:</h3>
                @foreach ($tags as $tag)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="tags[]" id="tag-{{$tag->id}}" value="{{$tag->id}}">
                        <label for="tag-{{$tag->id}}">
                            {{ $tag->name }}
                        </label>
                    </div>
                @endforeach
                
            </div>
            
            <div class="form-group">
                <input class="btn btn-primary" type="submit" value="Create Post">
            </div>
            
            
        </form>
    </div>
    
@endsection
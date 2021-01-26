@extends('layouts.main')

@section('content')

    <div class="container text-center">
        <h1 class="mb-3">404</h1>
    
        <p class="mb-3">Something seems to go wrong!</p>
        <a class="btn btn-primary mb-5" href="{{ route('homepage') }}">Back Home!</a>
    </div>
    
@endsection
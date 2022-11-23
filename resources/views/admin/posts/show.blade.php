@extends('layouts.dashboard')

@section('content')

    <h1>
        {{$post->title}}
    </h1>

    <p>
        {{$post->content}}
    </p>

    <div class="mt-3">
        <a href="{{route('admin.posts.edit', $psot->id)}}">Edit</a>
    </div>
@endsection

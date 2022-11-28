@extends('layouts.dashboard')

@section('content')
    <h1>
        {{ $category->name }}
    </h1>

    <div class="mb-2">
        <a href="{{ route('admin.categories.edit', $category->id) }}">Edit</a>
    </div>

    <div class="mb-2">
        <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <input onclick="confirm('Are you sure?')" class="delete-btn" type="submit" value="Delete">
        </form>
    </div>

    @foreach ($category->posts as $post)
        <div>
            <a href="{{ route('admin.posts.show', $post->id) }}"> {{ $post->title }}</a>
        </div>
    @endforeach
@endsection

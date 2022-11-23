@extends('layouts.dashboard')

@section('content')
    <form method="POST" action="{{route('admin.posts.update', $post->id)}}">
        @csrf
        @method('PATCH')
        <div>
            <label for="title">Titolo:</label>
            <input type="text" required minlength="5" maxlength="255" name="title" value="{{old('title', $post->title)}}">
        </div>

        <div>
            <label for="title">Descrizione:</label>
            <textarea name="content" required cols="30" rows="10">{{old('content', $post->content)}}</textarea>
        </div>

        <div>
            <input type="submit" value="Update">
        </div>
    </form>
@endsection

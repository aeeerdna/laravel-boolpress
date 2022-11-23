@extends('layouts.dashboard')

@section('content')
    <form method="POST" action="{{route('admin.posts.store')}}">
        @csrf
        <div>
            <label for="title">Titolo:</label>
            <input type="text" required minlength="5" maxlength="255" name="title" value="{{old('title', '')}}">
        </div>

        <div>
            <label for="title">Descrizione:</label>
            <textarea name="content" required cols="30" rows="10">{{old('content', '')}}</textarea>
        </div>

        <div>
            <input type="submit" value="Create">
        </div>
    </form>
@endsection

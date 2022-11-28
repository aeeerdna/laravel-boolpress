@extends('layouts.dashboard')

@section('content')
    @if ($errors->any())
        <div class="row">
            <div class="col-12 bg-danger">
                Error
            </div>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.posts.store') }}">
        @csrf
        <div @error('title') class="is-invalid" @enderror>
            <label for="title">Title:</label>
            <input type="text" name="title" value="{{ old('title', '') }}">
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- categorie -->
        <div @error('category_id') class="is-invalid" @enderror>
            <label for="category_id">Category: </label>
            <select name="category_id">
                <option value="">None</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == old('category_id', -1) ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>


        <div @error('content') class="is-invalid" @enderror>
            <label for="content">Content:</label>
            <textarea name="content" required cols="30" rows="10">{{ old('content', '') }}</textarea>
            @error('content')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- tags -->
        <div @error('tags') class="is-invalid" @enderror>
            <label>Tags:</label>
            @foreach ($tags as $tag)
                <input {{ in_array($tag->id, old('tags', [])) ? 'checked' : '' }} type="checkbox" name="tags[]"
                    value={{ $tag->id }}>
                <label>{{ $tag->name }}</label>
            @endforeach
        </div>

        <div>
            <input type="submit" value="Create">
        </div>
    </form>
@endsection

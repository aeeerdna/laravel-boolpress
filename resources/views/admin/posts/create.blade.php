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
            <input type="text" required minlength="5" maxlength="255" name="title" value="{{ old('title', '') }}">
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- categories -->
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
            <label for="content">Contenuto:</label>
            <textarea name="content" required cols="30" rows="10">{{ old('content', '') }}</textarea>
            @error('content')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <input type="submit" value="Crea">
        </div>
    </form>
@endsection

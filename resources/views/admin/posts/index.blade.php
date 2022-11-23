@extends('layouts.dashboard')

@section('content')
    <div class="row mt-3">
        <div class="col-12">
            <a href="{{route('admin.posts.create')}}">New</a>
        </div>
    </div>

    <div class="row">
        @foreach ($posts as $post)
            <div class="col-12">
                <a href="{{route('admin.posts.show', $post->id)}}">{{$post->title}}</a>
            </div>
        @endforeach
    </div>
@endsection

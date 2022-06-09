@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <h1>ALL POSTS</h1>
        <div class="col text-right">
            <a href="{{ route('admin.posts.create') }}">Create New Post</a>
        </div>
        @foreach ($posts as $post)
            <div class="col">
                <dl>
                    <dt>Title</dt>
                    <dd>{{ $post->title }}</dd>
                    <dt>Description</dt>
                    <dd>{{ $post->content }}</dd>
                </dl>
                <a href="{{ route('admin.posts.edit', $post) }}">Edit Post</a>
                <a href="{{ route('admin.posts.show', $post) }}">Show Post</a>
                <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <input type="submit" value="Delete Post">
                </form>
            </div>
        @endforeach
    </div>
@endsection

@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <h1>Details Post</h1>
        <form>
            @csrf

            <div>
                <img src="{{ asset('storage/' . $post->cover) }}" />
            </div>

            <div class="mb-3">
                <label class="d-block" for="title">Title</label>
                <input type="text" name="title" placeholder="Insert a Title" value="{{ old('title', $post->title) }}">
            </div>

            <div class="mb-3">
                <label class="d-block" for="slug">Slug</label>
                <input type="text" name="slug" value="{{ old('title', $post->slug) }}">
            </div>

            <div>
                <label class="d-block" for="content">Content</label>
                <textarea name="content" cols="30" rows="5" placeholder="Insert a Description">{{ old('content', $post->content) }}</textarea>
            </div>

            <div>
                <label class="d-block" for="tags">Tags</label>
                @foreach ($post->tags as $tag)
                    <span>{{ $tag->name }}</span>
                @endforeach
            </div>

            <a href="{{ route('admin.posts.index') }}">
                <- Back to all posts</a>
        </form>
    </div>
@endsection

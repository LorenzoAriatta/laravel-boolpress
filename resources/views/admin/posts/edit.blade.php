@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <h1>Edit Post</h1>
        <form action="{{ route('admin.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div>
                <img src="{{ asset('storage/' . $post->cover) }}" />
            </div>

            <select name="category_id">
                <option value="">--Scegli Categoria--</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == old('category_id') ? 'selected' : '' }}>
                        {{ $category->name }} </option>
                @endforeach
            </select>

            <div class="mb-3">
                <label class="d-block" for="title">Title</label>
                <input type="text" name="title" placeholder="Insert a Title" value="{{ old('title', $post->title) }}">
            </div>

            <div class="form-group">
                <label for="image">Edit Image</label>
                <input type="file" name="image" />
            </div>

            <div>
                <label class="d-block" for="content">Content</label>
                <textarea name="content" cols="30" rows="5" placeholder="Insert a Description">{{ old('content', $post->content) }}</textarea>
            </div>


            <div class="form-group">

                <div>Tags</div>
                @foreach ($tags as $tag)
                    @if ($errors->any())
                        <input type="checkbox" value="{{ $tag->id }}" name="tags[]"
                            {{ in_array($tag->id, old('tags', [])) ? 'checked' : '' }} />
                    @else
                        <input type="checkbox" value="{{ $tag->id }}" name="tags[]"
                            {{ $post->tags->contains($tag) ? 'checked' : '' }} />
                        <div class="form-check-label">{{ $tag->name }}</div>
                    @endif
                @endforeach


                @error('tags')
                    <div class="invalid-feedback"> {{ $message }}</div>
                @enderror

            </div>

            <input type="submit" value="Edit">
        </form>
    </div>
@endsection

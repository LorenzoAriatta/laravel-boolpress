@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <h1>Create a New Post</h1>
        <form action="{{ route('admin.posts.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <select name="category_id">
                <option value="">--Scegli Categoria--</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == old('category_id') ? 'selected' : '' }}>
                        {{ $category->name }} </option>
                @endforeach
            </select>

            <div class="mb-3">
                <label class="d-block" for="title">Title</label>
                <input type="text" name="title" placeholder="Insert a Title">
            </div>

            <div class="form-group">
                <label for="image">Upload Image</label>
                <input type="file" name="image" />
            </div>

            <div>
                <label class="d-block" for="content">Content</label>
                <textarea name="content" cols="30" rows="5" placeholder="Insert a Description"></textarea>
            </div>

            <input type="submit" value="Create">
            <div class="form-group">

                <label class="d-block" for="title">Tags</label>

                @foreach ($tags as $tag)
                    <div class="row align-items-center">

                        <input class="mx-2" type="checkbox" value="{{ $tag->id }}" name="tags[]"
                            {{ in_array($tag->id, old('tags', [])) ? 'checked' : '' }} />
                        <div class="form-check-label">{{ $tag->name }}</div>

                    </div>
                @endforeach

                @error('tags')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

            </div>
        </form>
    </div>
@endsection

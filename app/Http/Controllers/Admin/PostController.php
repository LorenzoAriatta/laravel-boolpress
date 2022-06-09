<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Category;

use App\Post;
use App\Tag;
use Log;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        Log::debug("store1");
        $request->validate([
            'title'=> 'required|max:250',
            'content'=> 'required',
            'tags' => 'exists:tags,id',
            'category_id' => 'required|exists:categories,id',
            'image'=> 'nullable|image'
        ], [
            'title.required' => 'Title must have a valor',
            'title.max' => 'Title too long',
            'tags' => 'Tag not existing',
            'category_id.exists' => 'Category selected not exist',
            'image'=> 'File selected is not a Image'
        ]);
        Log::debug("store2");

        $postData = $request->all();

        if(array_key_exists('image', $postData)) {
            $img_path = Storage::put('uploads', $postData['image']);
            $postData['cover'] = $img_path;
        }

        $newPost = new Post();

        $newPost->fill($postData);

        $slug = Str::slug($newPost->title);

        $alternativeSlug = $slug;

        $postFound = Post::where('slug', $slug)->first();

        $counter = 1;

        while($postFound){
            $alternativeSlug = $slug . '_' . $counter;
            $counter++;
            $postFound = Post::where('slug', $alternativeSlug)->first();
        }

        $newPost->slug = $alternativeSlug;

        $newPost->save();

        if(array_key_exists('tags', $postData)) {
            $newPost->tags()->sync($postData['tags']);
        }

        return redirect()->route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
        //$post = Post::findOrFail($id);
        $categories = Category::all();
        return view('admin.posts.show', compact('categories', 'post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
        //$post = Post::findOrFail($id);
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.edit', compact('categories', 'post', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'title'=> 'required|max:250',
            'content'=> 'required',
            'tags'=> 'exists:tags,id',
            'category_id' => 'required|exists:categories,id',
            'image'=> 'nullable|image'
        ], [
            'title.required' => 'Title must have a valor',
            'title.max' => 'Title too long',
            'tags' => 'Tag not existing',
            'category_id.exists' => 'Category selected not exist',
            'image'=> 'File selected is not a Image'
        ]);

        $post = Post::findOrFail($id);

        $updatePost = $request->all();

        if(array_key_exists('image', $updatePost)) {

            if($post->cover) {
                Storage::delete($post->cover);
            }

            $img_path = Storage::put('uploads', $updatePost['image']);
            $updatePost['cover'] = $img_path;
        }

        $post->fill($updatePost);

        $slug = Str::slug($post->title);

        $alternativeSlug = $slug;

        $postFound = Post::where('slug', $slug)->first();

        $counter = 1;

        while($postFound){
            $alternativeSlug = $slug . '_' . $counter;
            $counter++;
            $postFound = Post::where('slug', $alternativeSlug)->first();
        }

        $post->slug = $alternativeSlug;

        $post->update();

        if(array_key_exists('tags', $updatePost)) {
            $post->tags()->sync($updatePost['tags']);
        }

        return redirect()->route('admin.posts.index', compact('post'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post = Post::find($id);

        if($post){
            $post->tags()->sync([]);

            if($post->cover) {
                Storage::delete($post->cover);
            }

            $post->delete();

        }

        return redirect()->route('admin.posts.index');
    }
}

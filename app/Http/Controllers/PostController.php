<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            'posts' =>
                Post::latest()->filter(
                    request()->only('search', 'category', 'author')
                )->simplePaginate(6)->withQueryString()
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }
    public function store()
    {
        $attributes = request()->validate([
            'title' => ['required'],
            'slug' => ['required', Rule::unique('posts', 'slug')],
            'excerpt' => ['required'],
            'body' => ['required'],
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);

        $attributes['user_id'] = auth()->id();
        Post::create($attributes);

        $path = request()->file('thumbnail')->store('thumbnails');
        return $path;
//        return redirect("/posts/{$attributes['slug']}");
    }

    public function edit(Post $post)
    {
        return view('posts/edit', [
            'post' => $post
        ]);
    }

    public function update(Post $post)
    {
        $post->update(request()->validate([
            'title' => ['required'],
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post->id)],
            'excerpt' => ['required'],
            'body' => ['required'],
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]));

        return redirect("/posts/{$post->slug}");
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('/');
    }
}

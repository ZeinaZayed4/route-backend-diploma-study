<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(3);
        return view('posts.index', ['posts' => $posts]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'title' => ['required', 'string', 'min:8'],
            'body' => ['required', 'string'],
            'image' => ['required', 'image', 'mimes:png,jpg'],
        ]);

        $attributes['image'] = Storage::putFile('posts', $attributes['image']);
        $attributes['user_id'] = 1;

        Post::create($attributes);

        return redirect('/posts')->with('success', 'Post Created Successfully!');
    }

    public function show(Post $post)
    {
        return view('posts.show', ['post' => $post]);
    }

    public function edit(Post $post)
    {
        return view('posts.edit', ['post' => $post]);
    }

    public function update(Request $request, Post $post)
    {
        $attributes = $request->validate([
            'title' => ['required', 'string', 'min:8'],
            'body' => ['required', 'string'],
            'image' => ['required', 'image', 'mimes:png,jpg']
        ]);

        if ($request->hasFile('image')) {
            if ($post->image) {
                Storage::disk('public')->delete($post->image);
            }

            $attributes['image'] = Storage::putFile('posts', $attributes['image']);
        }

        $post->update($attributes);

        return redirect('/posts')->with('success', 'Post Updated Successfully!');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        Storage::delete($post->image);

        return redirect('/posts')->with('success', 'Post Deleted Successfully!');
    }
}

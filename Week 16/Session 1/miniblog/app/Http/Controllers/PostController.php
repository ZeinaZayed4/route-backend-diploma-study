<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', ['posts' => $posts]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        request()->validate([
            'title' => ['required', 'string', 'min:8'],
            'body' => ['required', 'string'],
        ]);

        Post::create([
            'title' => request('title'),
            'body' => request('body'),
            'user_id' => 1,
        ]);

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

    public function update(Post $post)
    {
        request()->validate([
            'title' => ['required', 'string', 'min:8'],
            'body' => ['required', 'string'],
        ]);

        $post->update([
            'title' => request('title'),
            'body' => request('body'),
        ]);

        return redirect('/posts')->with('success', 'Post Updated Successfully!');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect('/posts')->with('success', 'Post Deleted Successfully!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Post;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::with(['user', 'comments', 'tags', 'likes'])->latest()->paginate(5);
        return view('blog.index', compact('posts'));
    }

    public function show($slug)
    {
        $post = Post::with(['user', 'likes', 'comments' => fn ($query) => $query->orderBy('created_at', 'desc'), 'tags'])->where('slug', $slug)->firstOrFail();
        return view('blog.show', compact('post'));
    }
}

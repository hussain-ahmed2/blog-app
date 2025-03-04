<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Uri;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $name = $request->get('sort', 'created_at'); // Match form name="sort"
        $order = $request->get('order', 'desc'); // Match form name="order"

        $posts = Post::with(['user', 'comments', 'tags', 'likes'])
            ->orderByRaw(($name == 'title' ? 'LOWER(title)' : $name) . ' ' . $order) // if name = title then make it lower case and then sort 
            ->paginate(5)
            ->appends(['sort' => $name, 'order' => $order]);

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'min:5'],
            'content' => ['required', 'min:10'],
            'category' => ['required']
        ]);

        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'category_id' => $request->category,
            'user_id' => Auth::id()
        ]);

        return redirect('/posts');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $post = Post::with([
            'user', 
            'comments' => fn ($query) => $query->orderBy('created_at', 'desc'), 
            'tags', 
            'likes'
            ])->where('id', $id)->firstOrFail();
        return view('posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}

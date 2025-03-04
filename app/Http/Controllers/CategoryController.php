<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('name', 'asc')->get();
        return view('category.index', compact('categories'));
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        //
    }

    public function show(Request $request, $id)
    {
        $name = $request->get('sort', 'created_at'); // Match form name="sort"
        $order = $request->get('order', 'desc'); // Match form name="order"

        $category = Category::where('id', $id)->firstOrFail();
        $posts = Post::with(['user', 'comments', 'likes', 'tags'])
            ->where('category_id', $category->id)
            ->orderByRaw(($name == 'title' ? 'LOWER(title)' : $name) . ' ' . $order) // if name = title then make it lower case and then sort 
            ->paginate(5)
            ->appends(['sort' => $name, 'order' => $order]);
        
        return view('category.show', compact('category', 'posts'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}

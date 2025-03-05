<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Follower;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $posts = Post::with(['category', 'comments', 'tags'])
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        $totalPosts = Post::where('user_id', Auth::id())->count();
        $totalComments = Comment::whereIn('post_id', $posts->pluck('id'))->count();
        $totalFollowers = Follower::where('following_id', Auth::id())->count();

        return view('admin.dashboard', compact('posts', 'totalPosts', 'totalComments', 'totalFollowers'));
    }

    public function posts() 
    {
        $posts = Post::with(['category', 'comments', 'tags'])
            ->where('user_id', Auth::id())
            ->latest()
            ->paginate(5);
        return view('admin.posts', compact('posts'));
    }
}

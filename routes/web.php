<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TagController;
use App\Models\Post;


// Home
Route::get('/', function () {
    $featuredPost = Post::with(['user', 'comments', 'tags', 'likes'])->latest()->first();
    $recentPosts = Post::with(['user', 'comments', 'tags', 'likes'])
        ->latest()
        ->where('id', '!=', optional($featuredPost)->id)
        ->take(3)
        ->get();

    return view('index', compact('featuredPost', 'recentPosts'));
})->name('home');

// Guest Routes
Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);

    Route::get('/login', [SessionController::class, 'index'])->name('login');
    Route::post('/login', [SessionController::class, 'store']);
});

// Auth Routes
Route::middleware('auth')->group(function () {
    Route::delete('/logout', [SessionController::class, 'destroy'])->name('logout');
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/dashboard/posts', [AdminController::class, 'posts'])->name('admin.posts');

    // Post auth
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostController::class, 'store']);

    // Comment and Like auth
    Route::post('/posts/{id}/comment', [CommentController::class, 'store'])->name('comment.store');
    Route::post('/posts/{id}/like', [LikeController::class, 'toggleLike'])->name('like.toggle');
});

// Public Routes
// Posts
Route::resource('/posts', PostController::class)->only(['index', 'show']);

// Categories
Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
Route::get('/categories/{slug}', [CategoryController::class, 'show'])->name('categories.show');

// Tags
Route::get('/tag/{slug}', [TagController::class, 'show'])->name('tag.show');

// Search
Route::get('/search', [SearchController::class, 'show'])->name('search');


// Admin Panel Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/comments', [AdminController::class, 'comments'])->name('admin.comments');
    Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
});

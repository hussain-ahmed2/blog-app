<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
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

// Public Routes
Route::get('/', function () {
    $featuredPost = Post::with(['user', 'comments', 'tags', 'likes'])->latest()->first();
    $recentPosts = Post::with(['user', 'comments', 'tags', 'likes'])->latest()->where('id', '!=', optional($featuredPost)->id)->take(3)->get();
    return view('index', compact('featuredPost', 'recentPosts'));
})->name('home');

// Post public
Route::resource('/posts', PostController::class);
Route::get('/posts', [PostController::class, 'index'])->name('posts');
Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');

// Categories
Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
Route::get('/categories/{id}', [CategoryController::class, 'show'])->name('categories.show');

Route::get('/tag/{id}', [TagController::class, 'show'])->name('tag.show');

Route::get('/search', [SearchController::class, 'show'])->name('search');

// Guest Routes
Route::middleware('guest')->group(function () {
    // Register
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);

    // Login 
    Route::get('/login', [SessionController::class, 'index'])->name('login');
    Route::post('/login', [SessionController::class, 'store']);
});

// Auth Routes
Route::middleware('auth')->group(function () {
    Route::delete('/logout', [SessionController::class, 'destroy'])->name('logout');

    // Post auth
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostController::class, 'store']);

    // Comment and Like auth
    Route::post('/posts/{id}/comment', [CommentController::class, 'store'])->name('comment.store');
    Route::post('/posts/{id}/like', [LikeController::class, 'toggleLike'])->name('like.toggle');
});



// Comment & Like Routes

// // Admin Panel Routes
// Route::middleware(['auth', 'admin'])->group(function () {
//     Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');
//     Route::resource('/admin/posts', BlogController::class);
//     Route::get('/admin/comments', [AdminController::class, 'comments'])->name('admin.comments');
//     Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
// });

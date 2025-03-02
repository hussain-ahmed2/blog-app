<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\TagController;
use App\Models\Post;

// Public Routes
Route::get('/', function () {
    $posts = Post::with(['user', 'comments', 'tags', 'likes'])->latest()->take(3)->get();
    return view('index', compact('posts'));
})->name('home');

Route::get('/blogs', [BlogController::class, 'index'])->name('blogs');
Route::get('/blogs/{slug}', [BlogController::class, 'show'])->name('blogs.show');

Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
Route::get('/categories/{slug}', [CategoryController::class, 'show'])->name('categories.show');

Route::get('/tag/{slug}', [TagController::class, 'show'])->name('tag.show');

Route::get('/search', [SearchController::class, 'show'])->name('search');

// Guest Routes
Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

// Auth Routes
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::post('/post/{id}/comment', [CommentController::class, 'store'])->name('comment.store');
    Route::post('/post/{id}/like', [LikeController::class, 'toggleLike'])->name('like.toggle');
});



// Comment & Like Routes

// // Admin Panel Routes
// Route::middleware(['auth', 'admin'])->group(function () {
//     Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');
//     Route::resource('/admin/posts', BlogController::class);
//     Route::get('/admin/comments', [AdminController::class, 'comments'])->name('admin.comments');
//     Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
// });

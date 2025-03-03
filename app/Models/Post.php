<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;

    protected $guarded = [];

    // Define the relationship with user (A post belongs to a user)
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Define the relationship with category (A post belongs to a category)
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    // Define the relationship with comments (A post can have many comments)
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
    
    // Define the relationship with likes (A post can have many likes)
    public function likes(): HasMany
    {
        return $this->hasMany(Like::class);
    }

    // Define the relationship with like (A post is liked by current user or not)
    public function isLikedByUser(): bool
    {
        return $this->likes()->where('user_id', Auth::id())->exists();
    }

    // Define the relationship with tags (A post belongs to many tags)
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }
}

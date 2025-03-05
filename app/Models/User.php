<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Define the relationship with posts (A user can have many posts)
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    // Define the relationship with comments (A user can have many comments)
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    // Define the relationship with likes (A user can have many likes)
    public function likes(): HasMany
    {
        return $this->hasMany(Like::class);
    }

    // Define the relationship with followers (A user can have many followers)
    public function followers(): HasMany
    {
        return $this->hasMany(Follower::class, 'following_id');
    }

    // Define the relationship with followers (A user can follow many followers)
    public function following(): HasMany
    {
        return $this->hasMany(Follower::class, 'user_id');
    }
}

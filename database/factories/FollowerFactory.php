<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Follower>
 */
class FollowerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $followerId = User::inRandomOrder()->first()->id;
        $followingId = User::where('id', '!=', $followerId)->inRandomOrder()->first()->id;

        return [
            'user_id' => $followerId, // The user who follows
            'following_id' => $followingId, // The user being followed
        ];
    }
}

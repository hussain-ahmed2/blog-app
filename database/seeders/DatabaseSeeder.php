<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Like;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create 10 users, 5 categories, 10 posts, 20 likes, and 30 comments
        // User::factory(10)->create();
        // Category::factory(5)->create();
        //Post::factory(10)->create();
        // Like::factory(20)->create();
        // Comment::factory(30)->create();

        // $posts = Post::all();

        // $tags = Tag::factory(10)->create();

        // foreach ($posts as $post) {
        //     $post->tags()->attach($tags->random(rand(2, 4))->pluck('id'));
        // }
    }
}

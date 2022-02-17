<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Favourite;
use App\Models\Friend;
use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(4)->create();
        Post::factory(4)->create();
        Comment::factory(4)->create();
        Like::factory(4)->create();
        Friend::factory(4)->create();
        Favourite::factory(4)->create();

    }
}

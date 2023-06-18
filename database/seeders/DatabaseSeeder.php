<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $usersCount = 20;
        $postsCount = 1000;

        $postsPerUser = intval($postsCount / $usersCount);

        User::factory($usersCount)->create()->each(function ($user) use ($postsPerUser) {
            Post::factory($postsPerUser)->create(['user_id' => $user->id]);
        });

        $remainingPosts = $postsCount % $usersCount;

        if ($remainingPosts > 0) {
            $users = User::inRandomOrder()->take($remainingPosts)->get();
            foreach ($users as $user) {
                Post::factory()->create(['user_id' => $user->id]);
            }
        }
    }
}

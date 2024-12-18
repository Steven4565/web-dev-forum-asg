<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ForumPost;
use App\Models\ImagePost;
use App\Models\User;
use App\Models\ForumComment;
use Faker\Factory;

class PostAndStuff extends Seeder
{
    public function run(): void
    {
        $faker = Factory::create("ar_SA");

        // Create users for posts and comments and store full objects
        $postUsers = [];
        for ($i = 0; $i < 50; $i++) {
            $postUsers[] = User::create([
                'name' => $faker->name(),
                'email' => $faker->unique()->safeEmail(),
                'password' => bcrypt('password'), // Use bcrypt to hash the password
            ]);
        }

        $commentUsers = [];
        for ($i = 0; $i < 50; $i++) {
            $commentUsers[] = User::create([
                'name' => $faker->name(),
                'email' => $faker->unique()->safeEmail(),
                'password' => bcrypt('password'),
            ]);
        }

        // Image URLs
        $imageUrls = [
            '1.jpeg',
            '2.jpeg',
            '3.jpeg',
            '4.jpeg',
            '5.jpeg',
            '6.jpeg',
            '7.jpeg',
            '8.jpeg',
            '9.jpeg',
        ];

        // Create ForumPosts
        $posts = [];
        for ($i = 0; $i < 50; $i++) {
            $randomUser = $faker->randomElement($postUsers); // Full user object
            $posts[] = ForumPost::create([
                'category' => $faker->word(),
                'title' => $faker->sentence(),
                'content' => $faker->paragraph(),
                'views' => 0,
                'user_id' => $randomUser->id, // Use the user's ID
            ]);
        }

        // Create ImagePosts
        for ($i = 0; $i < 5; $i++) {
            $randomUser = $faker->randomElement($postUsers); // Full user object
            ImagePost::create([
                'url' => 'images/' . $faker->randomElement($imageUrls),
                'title' => $faker->word(),
                'description' => $faker->paragraph(),
                'user_id' => $randomUser->id, // Use the user's ID
            ]);
        }

        // Create main ForumComments
        $mainComments = [];
        for ($i = 0; $i < 50; $i++) {
            $randomUser = $faker->randomElement($commentUsers); // Full user object
            $mainComments[] = ForumComment::create([
                'content' => $faker->paragraph(),
                'forum_post_id' => $faker->randomElement($posts)->id, // Use the post's ID
                'user_id' => $randomUser->id, // Use the user's ID
            ]);
        }

        // Create replies to ForumComments
        for ($i = 0; $i < 10; $i++) {
            $randomUser = $faker->randomElement($commentUsers); // Full user object
            ForumComment::create([
                'content' => $faker->paragraph(),
                'parent_id' => $faker->randomElement($mainComments)->id, // Main comment's ID
                'forum_post_id' => $faker->randomElement($posts)->id, // Post's ID
                'user_id' => $randomUser->id, // Use the user's ID
            ]);
        }
    }
}

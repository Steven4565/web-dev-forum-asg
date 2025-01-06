<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ForumPost;
use App\Models\ImagePost;
use App\Models\User;
use App\Models\ForumComment;
use Faker\Factory;
use Illuminate\Support\Facades\File;

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

        // CHANGE THE LINK IF YOU WANT TO CHANGE THE PICTURE
        $imageUrls = [
            'https://placecats.com/300/200',
            'https://placecats.com/neo/300/200',
            'https://placecats.com/millie/300/150',
            'https://placecats.com/millie_neo/300/200',
            'https://placecats.com/neo_banana/300/200',
            'https://placecats.com/neo_2/300/200',
            'https://placecats.com/bella/300/200',
            ];

        $storagePath = public_path('storage/images'); // Path to public storage folder

    // Ensure the directory exists
        if (!File::exists($storagePath)) {
            File::makeDirectory($storagePath, 0775, true);
        }

        $savedImagePaths = [];
        $imageCounter = 1; // Initialize a counter to keep track of the image number

        foreach ($imageUrls as $imageUrl) {
            $imageContent = file_get_contents($imageUrl); // Download image content

            if ($imageContent) {
                // Rename image to a static name (e.g., 1.jpeg, 2.jpeg, etc.)
                $imageName = $imageCounter . '.jpeg';  // Set the desired file name
                $filePath = $storagePath . '/' . $imageName; // Define the full save path

                File::put($filePath, $imageContent); // Save the file locally
                $savedImagePaths[] = 'public/images/' . $imageName; // Store the relative path
                
                $imageCounter++; // Increment the counter for the next image
            } else {
                echo "Failed to download: " . $imageUrl . PHP_EOL;
            }
        }



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
                'url' => $faker->randomElement($savedImagePaths), // Use local path
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

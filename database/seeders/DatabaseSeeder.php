<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Tag;
use App\Models\User;
use App\Models\Listing;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        // Listing::factory(10)->create();
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $tag = Tag::factory(10)->create();

        User::factory(20)->create()->each(function ($user) use ($tag){
            Listing::factory(rand(1, 4))->create(['user_id' => $user->id])->each(function ($listing) use ($tag) {
                $listing->tag()->attach($tag->random(2));
            });
        }); 

    }
}
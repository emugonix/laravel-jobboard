<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listing>
 */
class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->sentence(rand(5, 7));
        $dateTime = fake()->dateTimeBetween('-1 month', 'now');
        $content = '';
        for ($i = 0; $i < 5; $i++) {
            $content .= '<p class="mb-4">'. fake()->sentence((rand(5,10)), true). '</p>';

        }

        return [
            'title' => $title,
            'slug' => Str::slug($title).'-'.rand(1111, 9999),
            'company' => fake()->company,
            'location' => fake()->country,
            'logo' => basename(fake()->image(storage_path('app\public'))),
            'is_highlighted' => (rand(1, 9) > 7),
            'is_active'=> true,
            'content'=> $content,
            'apply_link'=> fake()->url,
            'created_at'=> $dateTime,
            'updated_at'=> $dateTime
        ];
    }
}

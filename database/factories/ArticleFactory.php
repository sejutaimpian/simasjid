<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(mt_rand(3, 8)),
            'category_id' => mt_rand(1, 2),
            'slug' => fake()->slug(),
            'excerpt' => fake()->paragraph(2),
            'image' => 'article' . mt_rand(1, 9) . '.png',
            'body' => fake()->paragraph(mt_rand(20, 50)),
        ];
    }
}

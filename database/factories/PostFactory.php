<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Post>
 */
class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition()
    {
        return [
            'title' => $this->faker->title,
            'description' => $this->faker->sentence,
            'category' => $this->faker->word,
            'publication_date' => $this->faker->date(),
            'content' => $this->faker->paragraph,
            'author' => $this->faker->name,
            'created_at' => now(),
            'updated_at' => $this->faker->date,
        ];
    }
}

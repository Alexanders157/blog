<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Post;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'description' =>$this->faker->text(200),
            'category' => $this->faker->word,
            'publication_date' => $this->faker->date(),
            'content' => $this->faker->paragraph,
            'author' => $this->faker->name,
            'update_date' => $this->faker->date(),
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Post;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition(): array
    {
        $category = Category::query()->find(1);

        return [
            'title' => $this->faker->title,
            'description' =>$this->faker->sentence,
            'category' => $category->id,
            'publication_date' => $this->faker->date(),
            'content' => $this->faker->paragraph,
            'author' => $this->faker->name,
            'update_date' => $this->faker->date(),
        ];

        //return [
            //'title' => $this->faker->title,
            //'description' =>$this->faker->sentence,
           // 'category_id' => $category->id,
           // 'publication_date' => $this->faker->date(),
            //'content' => $this->faker->paragraph,
            //'author' => $this->faker->name,
            //'created_at' => now(),
            //'updated_at' => $this->faker->date(),
        //];
    }
}

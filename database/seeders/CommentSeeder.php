<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = Post::all();

            foreach ($posts as $post) {
                DB::insert('INSERT INTO comments (message, post_id, user_id) VALUES (?, ?)', [fake()->sentence, $post['id']]);
            }

    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;

class ApiPostController extends Controller
{
    public function get()
    {
        $posts = Post::all();
        return response()->json($posts);
    }
}

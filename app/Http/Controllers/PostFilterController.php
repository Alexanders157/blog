<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use App\Models\Post;

class PostFilterController extends Controller
{
    public function filter(Request $request)
    {
        $date = $request->input('date');
        $userId = auth()->id();
        $key = "user:{$userId}:filter_date";

        Redis::set($key, $date);

        $posts = Post::whereDate('created_at', $date)->get();

        return view('posts', compact('posts'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Redis;
use App\Models\Post;

class PostFilterController extends Controller
{
    public function filter(Request $request)
    {
        $dateString = $request->input('date');
        $date = Carbon::createFromFormat('Y-m-d', $dateString);
        $currentTime = Carbon::now()->format('H:i:s');
        $formattedDate = $date->format('Y-m-d') . ' ' . $currentTime;

        $userId = auth()->id();
        $key = "user:{$userId}:filter_date";

        Redis::set($key, $date);

        $posts = Post::whereDate('created_at', $date)->paginate();

        return view('posts', compact('posts'));
    }
}

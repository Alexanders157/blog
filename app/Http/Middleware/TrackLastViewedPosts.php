<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Redis;

class TrackLastViewedPosts
{
    public function handle($request, Closure $next)
    {
        if ($request->is('posts/*')) {
            $postId = $request->route('id');
            $userId = auth()->id();
            $key = "user:{$userId}:viewed_posts";

            Redis::lrem($key, 0, $postId);
            Redis::lpush($key, $postId);
            Redis::ltrim($key, 0, 4);
        }

        return $next($request);
    }
}

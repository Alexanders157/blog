<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Cache;

class TrackUserPath
{
    public function handle($request, Closure $next)
    {
        $userId = auth()->id();
        $path = $request->path();
        $key = "user:{$userId}:path";

        $paths = Cache::get($key, []);
        $paths[] = $path;
        Cache::put($key, $paths, now()->addMinutes(30));

        return $next($request);
    }
}

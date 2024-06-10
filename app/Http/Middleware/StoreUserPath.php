<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Cache;

class StoreUserPath
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle($request, Closure $next)
    {
        $path = $request->path();
        $userId = auth()->id();

        if ($userId) {
            Cache::store('memcached')->push("user:{$userId}:visited_pages", $path);
        }

        return $next($request);
    }
}

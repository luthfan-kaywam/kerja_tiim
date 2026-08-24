<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AccessLevelMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (! $request->user() || $request->user()->access_level < 1) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        return $next($request);
    }
}

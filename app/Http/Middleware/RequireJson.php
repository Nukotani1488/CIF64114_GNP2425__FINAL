<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RequireJson
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->isJson()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid request format. JSON expected.',
                'errors' => [
                    'format' => 'Invalid request format. JSON expected.',
                ],
            ], 400);
        }
        return $next($request);
    }
}

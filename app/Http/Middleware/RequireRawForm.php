<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RequireRawForm
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->getContentTypeFormat() === 'x-www-form-urlencoded') {
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid request format. Form data expected.',
                'errors' => [
                    'format' => 'Invalid request format. Form data expected.',
                ],
            ], 400);
        }

        return $next($request);
    }
}

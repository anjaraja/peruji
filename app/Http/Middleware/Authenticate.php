<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if Authorization header exists
        $authHeader = $request->header('Authorization');

        if (!$authHeader) {
            if ($request->expectsJson() || $request->is('api/*')) {
                return response()->json([
                    'message' => 'Unauthorized (1)',
                ], 401);
            }

            return route('/');
            // return response()->json([
            //     'message' => 'Authorization header missing.',
            // ], 401);
        }

        // Optionally: validate format (e.g., starts with "Bearer ")
        if (!str_starts_with($authHeader, 'Bearer ')) {
            if ($request->expectsJson() || $request->is('api/*')) {
                return response()->json([
                    'message' => 'Unauthorized (2)',
                ], 401);
            }

            return route('/');
            // return response()->json([
            //     'message' => 'Invalid Authorization header format.',
            // ], 401);
        }

        // Optionally: extract token and validate it (manually or using Auth guard)
        $token = substr($authHeader, 7); // Remove "Bearer "

        // If you're using Laravel Passport or Sanctum, you can try:
        if (auth('api')->check()) {
            return $next($request); // Authenticated user
        }

        if ($request->expectsJson() || $request->is('api/*')) {
            return response()->json([
                'message' => 'Unauthorized (3)',
            ], 401);
        }

        return route('/');
        // return response()->json([
        //     'message' => 'Invalid or expired token.',
        // ], 401);
    }
}

<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    protected function redirectTo($request): ?string
    {
        // Let Laravel handle API responses in Handler.php
        if ($request->expectsJson() || $request->is('api/*')) {
            return null;
        }
        
        return route('login'); // or whatever fallback you want
        // if ($request->is('api/*')) {
        //     return response()->json(['message' => 'Unauthenticated'], 401);
        // }

        // return redirect()->guest(route('login'));
    }
}

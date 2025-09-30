<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PreventBackHistory
{
    /**
     * Prevent browser from caching protected pages so back button can't show them after logout.
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        // Ensure $response is an instance that supports header() (Illuminate responses do).
        return $response->header('Cache-Control', 'no-store, no-cache, max-age=0, must-revalidate')
                        ->header('Pragma', 'no-cache')
                        ->header('Expires', 'Sat, 01 Jan 1990 00:00:00 GMT');
    }
}

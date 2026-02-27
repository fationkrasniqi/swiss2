<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserCanViewMessages
{
    public function handle(Request $request, Closure $next): Response
    {
        if (! $request->user()?->canViewMessages()) {
            abort(403, 'Unauthorized.');
        }

        return $next($request);
    }
}

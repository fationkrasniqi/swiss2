<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserCanViewClients
{
    public function handle(Request $request, Closure $next): Response
    {
        if (! $request->user()?->canViewClients()) {
            abort(403, 'Unauthorized.');
        }

        return $next($request);
    }
}

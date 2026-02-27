<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    public function handle(Request $request, Closure $next): Response
    {
        $supported = ['en', 'de', 'sq', 'fr'];
        $locale = Session::get('locale', 'sq');

        if (in_array($locale, $supported)) {
            App::setLocale($locale);
        }

        return $next($request);
    }
}

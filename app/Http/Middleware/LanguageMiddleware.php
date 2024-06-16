<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LanguageMiddleware
{
    /**
     * Handle an incoming request.
     **/
    public function handle(Request $request, Closure $next): mixed
    {
        $language = session('locale');
        App::setLocale($language);

        return $next($request);
    }
}

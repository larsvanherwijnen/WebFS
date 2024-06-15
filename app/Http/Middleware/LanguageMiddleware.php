<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

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

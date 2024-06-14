<?php

namespace App\Http\Middleware;

use App\Models\Table;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TabletIdentification
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user has identified the tablet. The identifier is stored in the session.
        $tablet = session()->get('tablet');
        if (!$tablet or Table::where('tabletId', $tablet)->doesntExist()) {
            return redirect()->route('tablet.identify');
        }
        return $next($request);
    }
}

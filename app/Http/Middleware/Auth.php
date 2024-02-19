<?php

namespace App\Http\Middleware;

use bug\Bug;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Auth
{
    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check()) {
            return abort(403,"Nie masz uprawnień");
        }
        return $next($request);
    }

}

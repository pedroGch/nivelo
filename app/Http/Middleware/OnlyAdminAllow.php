<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OnlyAdminAllow
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
      //chequea que el rol del usuario sea admin
      if (auth()->user()->rol != 'admin') {
          return redirect()->route('login')->with('status.message', 'No tenés permisos para acceder a esta página')->with('status.type', 'danger');
      }
        return $next($request);
    }
}

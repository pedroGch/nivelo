<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserAndAdminAllow
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
      //chequea que el rol del usuario sea user o admin
      if (auth()->user()->rol != 'user' && auth()->user()->rol != 'admin') {
          return redirect()->route('home')->with('status.message', 'No tienes permisos para acceder a esta página')->with('status.type', 'danger');
      }
        return $next($request);
    }
}

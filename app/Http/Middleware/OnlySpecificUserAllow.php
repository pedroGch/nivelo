<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\Review;

class OnlySpecificUserAllow
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
      // chequea que solo un usuario específico pueda acceder a la página
      // Suponiendo que el ID de la reseña se pasa como un parámetro de ruta llamado 'review_id'
        $reviewId = $request->route('review_id');

        // Encuentra la reseña por su ID
        $review = Review::find($reviewId);

        // Si no se encuentra la reseña o el usuario autenticado no es el dueño de la reseña, redirige a 'home'
        if (!$review || Auth::user()->id != $review->user_id) {
            return redirect()->route('categories')->with('status.message', 'No tienes permisos para acceder a esta página')->with('status.type', 'danger');
        }

        // Si el usuario autenticado es el dueño de la reseña, permite el acceso
        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\Notification;

class UnreadNotificationsMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check()) {
            $unreadNotifications = Notification::where('user_id', auth()->id())->where('read', 0)->count();
            View::share('unreadNotifications', $unreadNotifications);
        }

        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\Message;

class UnreadMessagesMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check()) {
            $unreadMessages = Message::whereHas('chat', function ($query) {
                $query->where('receiver_id', auth()->id());
            })->where('read', false)->count();
            View::share('unreadMessages', $unreadMessages);
        }

        return $next($request);
    }
}

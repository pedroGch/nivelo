<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserToken;

class FCMTokenController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'fcm_token' => 'required|string',
        ]);

        $userToken = UserToken::updateOrCreate(
            ['user_id' => auth()->id()],
            ['fcm_token' => $request->fcm_token]
        );

        return response()->json(['message' => 'Token stored successfully']);
    }
}

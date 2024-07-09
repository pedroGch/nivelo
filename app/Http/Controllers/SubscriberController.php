<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscriber;

class SubscriberController extends Controller
{
    // /**
    //  * Agrega un nuevo suscriptor a la base de datos
    //  * @param Request $request
    //  * @return \Illuminate\Http\RedirectResponse
    //  */
    // public function subscribeAction(Request $request)
    // {
    //     $request->validate(Subscriber::$rules, Subscriber::$errorMessages);
    //     try {
    //       $data = $request->only(['name-subscriber', 'email-subscriber']);
    //       Subscriber::create($data);
    //       return redirect()->route('home')->with('subscribe.message', '¡Gracias por suscribirte!');
    //     } catch (\Exception $e) {
    //       return redirect()->route('home')->with('subscribe.message', 'Hubo un error, intenta nuevamente.');
    //     }


    //     return redirect()->route('home');
    // }

   /**
     * Agrega un nuevo suscriptor a la base de datos
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function subscribeAction(Request $request)
    {
        $request->validate([
            'name-subscriber' => 'required|string|max:255',
            'email-subscriber' => 'required|email|max:255'
        ]);

        try {
            $data = $request->only(['name-subscriber', 'email-subscriber']);
            Subscriber::create($data);
            return response()->json(['message' => 'Ya te suscribiste, ¡Gracias!']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Hubo un error, intenta nuevamente.'], 500);
        }
    }
}

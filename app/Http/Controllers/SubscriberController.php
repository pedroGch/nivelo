<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscriber;

class SubscriberController extends Controller
{
    /**
     * Agrega un nuevo suscriptor a la base de datos
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function subscribeAction(Request $request)
    {
        $request->validate(Subscriber::$rules, Subscriber::$errorMessages);
        try {
          $data = $request->only(['name-subscriber', 'email-subscriber']);
          Subscriber::create($data);
          return redirect()->route('home')->with('status.message', '¡Gracias por suscribirte!');
        } catch (\Exception $e) {
          return redirect()->route('home')->with('status.message', 'Hubo un error, intenta nuevamente.');
        }


        return redirect()->route('home');
    }
}

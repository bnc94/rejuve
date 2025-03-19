<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, string $cantidad)
    {
        $stripePriceId = 'price_1R3hVFCtFsFf34ZtbAwqDiFE';
        
        $quantity = $cantidad;

        return $request->user()->checkout([$stripePriceId => $quantity], [
            'success_url' => route('pago-completado'),
            'cancel_url' => route('competencias'),
        ]);
    }
}

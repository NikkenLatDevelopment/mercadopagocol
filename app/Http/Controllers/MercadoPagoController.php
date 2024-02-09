<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MercadoPago\SDK;


class MercadoPagoController extends Controller
{
    public function checkout()
    {
        //SDK::setAccessToken(config('services.mercadopago.access_token'));
        SDK::setAccessToken('TEST-8481789250451041-010311-b6a27fc5ae8914410ffb65fb8a136873-1621179652');
        $preference = new \MercadoPago\Preference();
        // Configura la preferencia con los detalles de la compra

        $preference = new \MercadoPago\Preference();

        // Configura los detalles de la compra
        $item = new \MercadoPago\Item();
        $item->title = 'Producto de ejemplo';
        $item->quantity = 1;
        $item->unit_price = 100.00; // Precio del producto

        // Agrega el ítem a la preferencia
        $preference->items = [$item];

        // Configura otros detalles según tus necesidades
        $preference->back_urls = [
            'success' => route('checkout.success'), // URL de éxito
            'failure' => route('checkout.failure'), // URL de fallo
            'pending' => route('checkout.pending'), // URL de pendiente
        ];

        $preference->save();

        //return redirect($preference->init_point);
        return view('checkout', ['preference' => $preference]);


    }
}

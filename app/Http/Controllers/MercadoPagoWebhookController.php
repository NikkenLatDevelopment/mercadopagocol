<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MercadoPagoWebhookController extends Controller
{
    public function handleWebhook(Request $request)
    {
        // Obtener el evento del webhook
        $data = $request->all();

        // Procesar el evento
        // Tu lógica para manejar los eventos de MercadoPago aquí

        // Responder al servidor de MercadoPago con un código 200
        return response()->json(['status' => 'OK'], 200);
    }
}


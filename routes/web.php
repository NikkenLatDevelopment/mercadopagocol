<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use MercadoPago;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});




Route::post('/webhook/mercadopago', function (Request $request) {
    $payload = $request->all();

    // Validar la autenticidad de la notificación
    if (MercadoPago\SDK::validateWebhook($payload)) {
        // La notificación es válida, manejarla según sea necesario
        $tipo_notificacion = $payload['type'];
        $data = $payload['data'];

        // Realizar acciones basadas en el tipo de notificación recibida
        // Por ejemplo:
        if ($tipo_notificacion === 'payment') {
            // Procesar el pago
            $payment_id = $data['id'];
            // Realizar acciones adicionales, como actualizar el estado del pedido, enviar un correo electrónico de confirmación, etc.
        }

        // Responder a MercadoPago con un código 200
        return response('OK', 200);
    } else {
        // La notificación no es válida, responder con un código 400
        return response('Invalid', 400);
    }
});

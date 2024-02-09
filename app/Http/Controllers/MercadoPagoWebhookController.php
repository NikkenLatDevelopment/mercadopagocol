<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class MercadoPagoWebhookController extends Controller
{
    public function handleWebhook(Request $request)
    {
        // Obtener el evento del webhook
        $data = $request->all();

    // Procesar el evento
    // Tu lógica para manejar los eventos de MercadoPago aquí

    // Guardar la respuesta en el archivo de logs
    Log::info('Respuesta del webhook de MercadoPago: ' . json_encode($data));

    // Responder al servidor de MercadoPago con un código 200
    return response()->json(['status' => 'OK'], 200);
    }

    public function viewLogs()
{
    // Obtener el contenido del archivo de logs
    $logContent = File::get(storage_path('logs/laravel.log'));

    // Mostrar el contenido en una vista
    return view('logs', ['logContent' => $logContent]);
}

}


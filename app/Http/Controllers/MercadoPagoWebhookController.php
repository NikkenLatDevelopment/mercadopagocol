<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;



class MercadoPagoWebhookController extends Controller
{
    public function handleWebhook(Request $request)
    {
        // Obtener el evento del webhook
        $data = $request->all();

    // Procesar el evento
    // Tu lógica para manejar los eventos de MercadoPago aquí

    // Guardar la respuesta en el archivo de logs
   // Log::info('Respuesta del webhook de MercadoPago: ' . json_encode($data));
  // Guardar la respuesta en el archivo de logs personalizado
  Log::channel('mercadopago')->info('Respuesta del webhook de MercadoPago: ' . json_encode($data));

  // Redirigir a la vista de logs con un mensaje opcional
  return redirect()->route('logs')->with('message', 'Registro de webhook guardado con éxito');
    }

    public function viewLogs()
{
    // Obtener el contenido del archivo de logs personalizado
    $logContent = File::get(storage_path('logs/mercadopago.log'));

    // Mostrar el contenido en una vista
    return view('logs', ['logContent' => $logContent]);
}

}


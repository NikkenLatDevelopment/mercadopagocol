<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;



class MercadoPagoWebhookController extends Controller
{
    public function handleWebhook(Request $request)
    {
        
        $data = $request->all();
        Log::channel('mercadopago')->info('Webhook Response', $data);
        return response()->json(['success' => true]);



    }

    public function viewLogs()
{
    // Obtener el contenido del archivo de logs personalizado
    $logContent = File::get(storage_path('logs/mercadopago.log'));

    // Mostrar el contenido en una vista
    return view('logs', ['logContent' => $logContent]);
}

}


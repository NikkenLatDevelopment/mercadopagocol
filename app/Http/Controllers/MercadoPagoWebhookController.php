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
    
    try {
        $logContent = File::get(storage_path('logs/mercadopago.log'));
        return view('logs', ['logContent' => $logContent]);
    } catch (\Exception $e) {
        // Manejo de excepciones
        return "Error: " . $e->getMessage();
    }
    
}

}


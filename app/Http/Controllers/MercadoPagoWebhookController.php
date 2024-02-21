<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Log;
use App\Models\WebhookLog; 
use Illuminate\Support\Str;


class MercadoPagoWebhookController extends Controller
{
    public function handleWebhook(Request $request)
    {
        /*funcion para log especifico*/
        /*
        $data = $request->all();
        Log::channel('mercadopago')->info('Webhook Response', $data);
        return response()->json(['success' => true]);
        */
        /*funcion para log general*/

         // Guardar los datos en la base de datos
   
        $webhookLog = new WebhookLog();    
        $webhookLog->payment_method = $data['data']['type'] ?? null; // Puedes ajustar este valor según tus necesidades
        $webhookLog->log_description = 'Webhook Response'; // Puedes ajustar este valor según tus necesidades
        $webhookLog->log_data = Str::limit(json_encode($data), 255); // Limitar la longitud de la cadena a 255 caracteres para SQL Server
        $webhookLog->save();



        $data = $request->all();
        Log::info('Webhook Response', $data); // Utilizando el logger por defecto
        return response()->json(['success' => true]);


    }

    public function viewLogs()
    {

        /*funcion para log especifico*/
        /*
        try {
            $logContent = File::get(storage_path('logs/mercadopago.log'));
            return view('logs', ['logContent' => $logContent]);
        } catch (\Exception $e) {
            // Manejo de excepciones
            return "Error: " . $e->getMessage();
        }
        */
        try {
            $logContent = File::get(storage_path('logs/laravel.log'));
            return Response::make($logContent, 200, [
                'Content-Type' => 'text/plain',
                'Content-Disposition' => 'inline',
            ]);
        } catch (\Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }

}


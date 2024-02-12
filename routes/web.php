<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MercadoPagoWebhookController;
use App\Http\Controllers\MercadoPagoController;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

//use MercadoPago;

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


Route::any('webhooks/mercadopago', [MercadoPagoWebhookController::class, 'handleWebhook']);
/*vista para logs */
//Route::get('/logs', [MercadoPagoWebhookController::class, 'viewLogs'])->name('logs');

Route::get('logs/mercadopago', function () {
    try {
        $logContent = File::get(storage_path('logs/mercadopago.log'));
        return Response::make($logContent, 200, [
            'Content-Type' => 'text/plain',
            'Content-Disposition' => 'inline',
        ]);
    } catch (\Exception $e) {
        return "Error: " . $e->getMessage();
    }
});




/*pago por checkout mercado pago*/
Route::get('/checkout', [MercadoPagoController::class, 'checkout'])->name('checkout');
Route::get('/checkout/success', [MercadoPagoController::class, 'success'])->name('success');
Route::get('/checkout/failure', [MercadoPagoController::class, 'failure'])->name('failure');
Route::get('/checkout/pending', [MercadoPagoController::class, 'pending'])->name('pending');

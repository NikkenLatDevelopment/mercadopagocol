<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MercadoPagoWebhookController;
use App\Http\Controllers\MercadoPagoController;


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
Route::get('/logs', [MercadoPagoWebhookController::class, 'viewLogs'])->name('logs');

/*pago por checkout mercado pago*/
Route::get('/checkout', [MercadoPagoController::class, 'checkout'])->name('checkout');
Route::get('/checkout/success', [MercadoPagoController::class, 'success'])->name('checkout.success');
Route::get('/checkout/failure', [MercadoPagoController::class, 'failure'])->name('checkout.failure');
Route::get('/checkout/pending', [MercadoPagoController::class, 'pending'])->name('checkout.pending');

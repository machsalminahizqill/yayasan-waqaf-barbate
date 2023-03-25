<?php

use App\Http\Controllers\donasi\PaymentCallbackController;
use App\Http\Controllers\pages\donasiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::prefix('donasi')->group(function () {
    Route::post('get-snaptoken', [donasiController::class, 'getSnapToken']);
    Route::post('payments/midtrans-notification', [PaymentCallbackController::class, 'receive']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

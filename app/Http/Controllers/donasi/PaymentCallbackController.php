<?php

namespace App\Http\Controllers\donasi;

use App\Http\Controllers\Controller;
use App\Models\donasi;
use Illuminate\Http\Request;
use App\Services\Midtrans\CallbackService;

class PaymentCallbackController extends Controller
{

    public function receive(Request $request)
    {

        $json = json_decode($request->getContent());
        dd($request);
        $signature_key = hash('sha512', $json->order_id . $json->status_code . $json->gross_amount . env('MIDTRANS_SERVER_KEY'));

        if($signature_key != $json->signature_key){
            return response()
                ->json([
                    'error' => true,
                    'message' => 'Signature key tidak terverifikasi',
                ], 403);
        }

        //status berhasil
        $order = donasi::where('order_id', $json->order_id)->first();
        $order->update(['payment_status' => $json->transaction_status]);

        return response()
        ->json([
            'success' => true,
            'message' => 'Notifikasi berhasil diproses',
        ]);


        // $statusCode = $json->transaction_status->status_code;
        // $transactionStatus = $json->transaction_status->transaction_status;
        // $fraudStatus = !empty($json->transaction_status->fraud_status) ? ($json->transaction_status->fraud_status == 'accept') : true;

        // if ($statusCode == 200 && $fraudStatus && ($transactionStatus == 'capture' || $transactionStatus == 'settlement')) {
        //     donasi::where('id', $order->id)->update([
        //         'payment_status' => 2,
        //     ]);
        // }

        // if ($json->transaction_status == 'expire') {
        //     donasi::where('id', $order->id)->update([
        //         'payment_status' => 3,
        //     ]);
        // }

        // if ($json->transaction_status == 'cancel') {
        //     donasi::where('id', $order->id)->update([
        //         'payment_status' => 4,
        //     ]);
        // }



    }
}

<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use App\Models\donasi;
use Illuminate\Http\Request;

class donasiController extends Controller
{
    public function donasi(){

        return view('guest.pages.donasi.main');
    }

    public function maintenanceDonasi()
    {
        return view('guest.pages.donasi.maintenance');
    }

    public function getSnapToken(Request $request)
    {
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = env('MIDTRANS_IS_PRODUCTION');
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => $request->totalDonasi,
            ),

            'customer_details' => array(
                'first_name' => $request->nama,
                'last_name' => '',
                'email' => 'hizqil.web@gmail.com',
                'phone' => $request->phone,
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        $order = new donasi();
        $order->payment_status = 'diproses';
        $order->nama = isset($request->nama) ? $request->nama : null;
        $order->email = 'hizqil.web@gmail.com';
        $order->phone = isset($request->phone) ? $request->phone : null;
        $order->order_id = $params['transaction_details']['order_id'];
        $order->gross_amount = $request->totalDonasi;
        $order->snap_token = $snapToken;
        $order->save();


        return response()->json([
            "snap_token" => $snapToken
        ]);
    }
}

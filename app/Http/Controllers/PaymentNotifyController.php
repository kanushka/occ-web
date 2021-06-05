<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PaymentNotifyController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Order $order)
    {
        Log::debug('PaymentNotifyController : ' . json_encode($request));
        Log::debug('order : ' . json_encode($order));

        $merchantId = $request->input('merchant_id');
        $orderId = $request->input('order_id');
        $payhereAmount = $request->input('payhere_amount');
        $payhereCurrency = $request->input('payhere_currency');
        $statusCode = $request->input('status_code');
        $md5sig = $request->input('md5sig');

        $merchantSecret = config('payment.payhere.secret');

        // validate hash
        $localMd5sig = strtoupper(md5($merchantId . $orderId . $payhereAmount . $payhereCurrency . $statusCode . strtoupper(md5($merchantSecret))));

        if (($localMd5sig === $md5sig) && ($statusCode == 2) && ($orderId == $order->id)) {
            // payment success
            Log::debug('PaymentNotifyController : payment verification success');

            $order->payments()->create([
                'response' => $request->all(),
            ]);

            $order->status = "processing";
            $order->paid_at = now();
            $order->save();
            Log::debug('PaymentNotifyController : order updated');
        }

        Log::debug('PaymentNotifyController : End');
    }
}

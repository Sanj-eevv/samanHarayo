<?php

namespace App\Http\Controllers\Front;

use App\Helpers\PayPalSdkHelper;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use Stripe\PaymentIntent;
use Stripe\Stripe;

class PaymentController extends Controller
{
    public function getStripePaymentIntent(Request $request)
    {
        $total = $request->input('total');
        $stripe_secret = config('app.settings.stripe_secret_key');
        Stripe::setApiKey($stripe_secret);
        $intent = null;
        $currencyType = 'USD';
        $adjustedAmount = $total * 100;
        $paymentIntentId = $request->input('paymentIntentId');

        if (($paymentIntentId == "0") || ($paymentIntentId == "") || ($paymentIntentId == null)) {
            $intent = PaymentIntent::create([
                'amount'                => $adjustedAmount,
                'currency'              => $currencyType,
                'payment_method_types'  => ['card'],
            ]);
        } else {
            $intent = PaymentIntent::retrieve($paymentIntentId);
            PaymentIntent::update(
                $paymentIntentId,
                [
                    'amount' => $adjustedAmount,
                ]
            );
        }
        return $intent;
    }

//    public function getPaypalPaymentIntent(Request $request){
//        $session_total = session('total');
//        $total_price = $request->input('total');
//        if (floatval($total_price) != floatval($session_total)) {
//            return response()->json(['price_discrepancy',201]);
//        }
//        return response()->json(['successful_validation' => 'success',200]);
//    }
}

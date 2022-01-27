<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use Stripe\PaymentIntent;
use Stripe\Stripe;

class StripeController extends Controller
{
    public function getStripePaymentIntent(Request $request)
    {
        $session_total = session('total');
        $total_price = $request->input('amount');
        if (floatval($total_price) != floatval($session_total)) {
            return null;
        }
        $stripe_secret = config('app.settings.stripe_secret_key');
        Stripe::setApiKey($stripe_secret);
        $intent = null;
        $currencyType = 'USD';
        $adjustedAmount = $total_price * 100;
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
}
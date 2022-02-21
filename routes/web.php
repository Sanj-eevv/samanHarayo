<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [\App\Http\Controllers\Front\IndexController::class, 'index'])->name('front.index');

// Social Routes
Route::get('auth/facebook', [\App\Http\Controllers\Social\FacebookController::class, 'facebookRedirect'])->name('auth.facebookRedirect');
Route::get('auth/facebook/callback', [\App\Http\Controllers\Social\FacebookController::class, 'loginWithFacebook'])->name('auth.facebookLogin');
Route::get('auth/google', [\App\Http\Controllers\Social\GoogleController::class, 'googleRedirect'])->name('auth.googleRedirect');
Route::get('auth/google/callback', [\App\Http\Controllers\Social\GoogleController::class, 'loginWithGoogle'])->name('auth.googleLogin');

// protected routes
Route::group(['middleware' => ['auth', 'verified']], function () {
    /** Custom Auth Routes */
    Route::get('/email-verified', function (){
        return view('auth.email-verified');
    });
    Route::resource('/report-lost', \App\Http\Controllers\Front\LostReportController::class)->except('create' );
    Route::resource('/report-found', \App\Http\Controllers\Front\FoundReportController::class);
    Route::post('payment/stripe', [\App\Http\Controllers\Front\StripeController::class, 'getStripePaymentIntent'])->name('stripe.payment');
    Route::post('payment/paypal', [\App\Http\Controllers\Front\StripeController::class, 'getPaypalPaymentIntent'])->name('paypal.payment');
    Route::post('payment/createOrderPaypal', [\App\Http\Controllers\Front\StripeController::class, 'createOrderPaypal']);


    Route::get('/checkout', [\App\Http\Controllers\Front\CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('checkout/fulfill-order', [\App\Http\Controllers\Front\CheckoutController::class, 'fulfillOrder'])->name('checkout.fulfillOrder');



    /** BackEnd Starts*/
    Route::group(['prefix' => 'dashboard'], function () {
        Route::get('/', [\App\Http\Controllers\Dashboard\DashboardController::class, 'index'])->name('dashboard.index');
        Route::resource('found-reports', \App\Http\Controllers\Dashboard\FoundReportController::class);
        Route::resource('lost-reports', \App\Http\Controllers\Dashboard\LostReportController::class);
        Route::resource('users', \App\Http\Controllers\Dashboard\UserController::class);
    });

});

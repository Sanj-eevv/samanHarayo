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
Route::get('/contact', [\App\Http\Controllers\Front\ContactController::class, 'index'])->name('front.contact.index');
Route::post('/contact', [\App\Http\Controllers\Front\ContactController::class, 'store'])->name('front.contact.store');
Route::get('/details/{slug}', [\App\Http\Controllers\Front\IndexController::class , 'show'])->name('front.details');
Route::get('/faqs', [\App\Http\Controllers\Front\FaqController::class, 'index'])->name('front.faqs.index');
Route::get('/listing', [\App\Http\Controllers\Front\IndexController::class , 'listing'])->name('front.listing');



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
    Route::resource('/identity', \App\Http\Controllers\Front\IdentityController::class);
    Route::post('payment/stripe', [\App\Http\Controllers\Front\PaymentController::class, 'getStripePaymentIntent'])->name('stripe.payment');
//    Route::post('payment/paypal', [\App\Http\Controllers\Front\PaymentController::class, 'getPaypalPaymentIntent'])->name('paypal.payment');
    Route::post('payment/createOrderPaypal', [\App\Http\Controllers\Front\PaymentController::class, 'createOrderPaypal']);
    Route::post('payment/pre-payment-validation', [\App\Http\Controllers\Front\CheckoutController::class, 'prePaymentValidation'])->name('checkout.prePaymentValidation');
    Route::get('/checkout', [\App\Http\Controllers\Front\CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('checkout/fulfill-order', [\App\Http\Controllers\Front\CheckoutController::class, 'fulfillOrder'])->name('checkout.fulfillOrder');

    /* Customer Dashboard */
    Route::get('customer-dashboard', [\App\Http\Controllers\Customer\DashboardController::class, 'index'])->name('customerDashboard.index');
    /** BackEnd Starts*/
    Route::group(['prefix' => 'dashboard'], function () {
        Route::get('/', [\App\Http\Controllers\Dashboard\DashboardController::class, 'index'])->name('dashboard.index');
        Route::resource('contacts', \App\Http\Controllers\dashboard\ContactController::class);
        Route::resource('faqs', \App\Http\Controllers\Dashboard\FaqController::class);
        Route::resource('found-reports', \App\Http\Controllers\Dashboard\FoundReportController::class);
        Route::resource('lost-reports', \App\Http\Controllers\Dashboard\LostReportController::class);
        Route::resource('users', \App\Http\Controllers\Dashboard\UserController::class);
    });

});
//LocalHubHelper::uniqueSlugify($request->input('slug'), Post::class, null, 'slug'),
//        "facade/ignition": "^2.5",

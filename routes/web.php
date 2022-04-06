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
    Route::post('payment/createOrderPaypal', [\App\Http\Controllers\Front\PaymentController::class, 'createOrderPaypal']);
    Route::post('payment/pre-payment-validation', [\App\Http\Controllers\Front\CheckoutController::class, 'prePaymentValidation'])->name('checkout.prePaymentValidation');
    Route::get('/checkout', [\App\Http\Controllers\Front\CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('checkout/fulfill-order', [\App\Http\Controllers\Front\CheckoutController::class, 'fulfillOrder'])->name('checkout.fulfillOrder');



    /** Customer Dashboard */
    Route::group(['prefix' => 'customer-dashboard'], function () {
        Route::get('/', [\App\Http\Controllers\Customer\DashboardController::class, 'index'])->name('customerDashboard.index');
        Route::get('/claim', [\App\Http\Controllers\Customer\ClaimController::class, 'index'])->name('customerDashboard.claim');
        Route::get('/claim/{slug}', [\App\Http\Controllers\Customer\ClaimController::class, 'show'])->name('customerDashboard.claim.show');
        Route::get('/report', [\App\Http\Controllers\Customer\ReportController::class, 'index'])->name('customerDashboard.report');
        Route::get('/report/claim/{user}/{report}', [\App\Http\Controllers\Customer\ReportController::class, 'claimShow'])->name('customerDashboard.report.claim.show');
        Route::get('/report/{slug}', [\App\Http\Controllers\Customer\ReportController::class, 'show'])->name('customerDashboard.report.show');
    });

    /** Admin Dashboard */
    Route::group(['prefix' => 'dashboard'], function () {
        Route::get('/', [\App\Http\Controllers\Dashboard\DashboardController::class, 'index'])->name('dashboard.index');
        Route::delete('/claim/delete/{user_id}/{report_id}', [\App\Http\Controllers\Dashboard\ClaimController::class, 'delete'])->name('dashboard.claim.delete');
        Route::get('/claim/show/{user}/{report}', [\App\Http\Controllers\Dashboard\ClaimController::class, 'show'])->name('dashboard.claim.show');
        Route::put('/claim/update/{user}/{report}', [\App\Http\Controllers\Dashboard\ClaimController::class, 'update'])->name('dashboard.claim.update');
        Route::resource('contacts', \App\Http\Controllers\Dashboard\ContactController::class)->except(['update', 'edit', 'create', 'store']);
        Route::resource('faqs', \App\Http\Controllers\Dashboard\FaqController::class);
        Route::resource('found-reports', \App\Http\Controllers\Dashboard\FoundReportController::class)->except('create','edit', 'store');
        Route::resource('lost-reports', \App\Http\Controllers\Dashboard\LostReportController::class)->only('index','show', 'destroy');
        Route::resource('roles', \App\Http\Controllers\Dashboard\RoleController::class);
        Route::resource('users', \App\Http\Controllers\Dashboard\UserController::class);
    });

});

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

Route::get('/', function () {
    return view('welcome');
})->name('front.index');

// Social Routes
Route::get('auth/facebook', [\App\Http\Controllers\Social\FacebookController::class, 'facebookRedirect'])->name('auth.facebookRedirect');
Route::get('auth/facebook/callback', [\App\Http\Controllers\Social\FacebookController::class, 'loginWithFacebook'])->name('auth.facebookLogin');

// protected routes
Route::group(['middleware' => ['auth', 'verified']], function () {
    /** Custom Auth Routes */
    Route::get('/email-verified', function (){
        return view('auth.email-verified');
    });
    Route::resource('/report-lost', \App\Http\Controllers\Front\LostController::class);
    Route::resource('/report-found', \App\Http\Controllers\Front\FoundController::class);


    /** BackEnd Starts*/
    Route::group(['prefix' => 'dashboard'], function () {
        Route::get('/', [\App\Http\Controllers\Dashboard\DashboardController::class, 'index'])->name('dashboard.index');
    });

});

<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;

class BaseCustomerDashboardController extends Controller
{
    public function __construct(Guard $auth)
    {
        $this->middleware('auth');
        view()->composer('*', function($view) use ($auth) {
            if (Schema::hasTable('notifications')) {
                $user = Auth::user();
                $notification_count = $user->unreadNotifications->count();
            }
            \View::share('GLOBAL_CUSTOMER_NOTIFICATION', $notification_count);
        });
    }
}

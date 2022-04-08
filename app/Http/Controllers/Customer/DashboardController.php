<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends BaseCustomerDashboardController
{
    public function index(){
        return view('customer_dashboard.dashboard.index');
    }
}

<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Report;

class IndexController extends Controller
{
    public function index(){
        $featured_reports = Report::whereHas('boost')->with('featured_photo')->get();
        return view('welcome', compact('featured_reports'));
    }
}

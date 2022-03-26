<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use App\Models\FoundReport;
use App\Models\LostReport;
use App\Models\Report;
use Illuminate\Http\Request;


class IndexController extends Controller
{
    public function index(){
        $featured_reports   = Feature::with('report')->get();
        $found_reports = Report::with('randomImage')->where('report_type', Report::REPORT_TYPE_FOUND)->orderBy('created_at', 'desc')->take(12)->get();
        $lost_reports  = Report::with(['randomImage', 'reward'])->where('report_type', Report::REPORT_TYPE_LOST)->orderBy('created_at', 'desc')->take(12)->get();
        return view('welcome', compact('featured_reports', 'found_reports', 'lost_reports'));
    }

    public function show($slug,  Request $request){
        $report = Report::where('slug',$slug)->first();
        $report->load('itemImages', 'category', 'reward', 'location');
        return view('front.details', compact('report'));
    }

    public function listing(){
        return view('front.listing');
    }
}

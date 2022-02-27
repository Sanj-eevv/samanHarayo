<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Http\Request;


class IndexController extends Controller
{
    public function index(){
        $featured_reports   = Report::whereHas('boost')->with('featured_photo')->get();
        $found_reports = Report::with('random_photo')->where('report_type',Report::REPORT_TYPE_FOUND)->get();
        $lost_reports  = Report::with('random_photo', 'reward')->where('report_type', Report::REPORT_TYPE_LOST)->get();
        return view('welcome', compact('featured_reports', 'lost_reports', 'found_reports'));
    }

    public function show(Report $report,  Request $request){
        $report_type = $request->input('type');
        $report->load('photos', 'category', 'reward', 'location');
        if($report_type === Report::REPORT_TYPE_LOST || $report_type === Report::REPORT_TYPE_FOUND){
            return view('front.details', compact('report', 'report_type'));
        }
        abort('404');
    }
}

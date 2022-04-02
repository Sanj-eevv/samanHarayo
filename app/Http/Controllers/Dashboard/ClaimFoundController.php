<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\ItemImage;
use App\Models\Report;
use App\Models\User;
use Illuminate\Http\Request;

class ClaimFoundController extends Controller
{
    public function show($user_id,$report){
        $user = User::where('id', $user_id)->first();
        $_report = Report::with(['claimUsers' => function($q) use($user_id){
            $q->where('user_id', $user_id);
        }])->where('slug', $report)->first();
        if(!$user && !$_report){
            abort(404);
        }
        $item_images = ItemImage::where('report_id', $_report->id)->where('claimed_by', $user_id)->get();
        return view('dashboard.found-reports.claim.show', compact('_report', 'item_images','user'));
    }
}

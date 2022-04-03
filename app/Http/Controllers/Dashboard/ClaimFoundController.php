<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\ItemImage;
use App\Models\Report;
use App\Models\User;
use Illuminate\Http\Request;

class ClaimFoundController extends Controller
{
    public function show($user,$report){
       $user = User::where('slug', $user)->first();
       $report = Report::where('slug', $report)->with('claimImages')->first();
       if(!$user || !$report){
           abort(404);
       }
       $claim_detail = \DB::table('claim_user')->where('report_id', $report->id)->where('user_id', $user->id)->first();
        if(!$claim_detail){
            abort(404);
        }
//        $item_images = ItemImage::where('report_id', $report->id)->where('claimed_by', $user->id)->get();
        return view('dashboard.found-reports.claim.show', compact('claim_detail','user', 'report'));
    }

    public function delete($user_id,$report_id){
        $user = User::where('id', $user_id)->first();
        $report = Report::where('id', $report_id)->first();
        if(!$user || !$report){
            return response()->json([
                'message' => 'Record Not Found',
            ], 400);
        }
        $report->claimUsers()->detach($user);
        return response()->json([
            'message' => 'Claim Successfully Deleted',
        ], 200);
    }
}

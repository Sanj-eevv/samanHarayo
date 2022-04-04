<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\ItemImage;
use App\Models\Report;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClaimFoundController extends BaseDashboardController
{
    public function show($user,$report){
       $user = User::where('slug', $user)->first();
        $report = Report::where('slug', $report)->first();
        if(!$user || !$report){
            abort(404);
        }
        $item_images = DB::table('item_images')->where('report_id', $report->id)->where('claimed_by', $user->id)->get();
       $claim_detail = \DB::table('claim_user')->where('report_id', $report->id)->where('user_id', $user->id)->first();
        if(!$claim_detail){
            abort(404);
        }
//        $item_images = ItemImage::where('report_id', $report->id)->where('claimed_by', $user->id)->get();
        return view('dashboard.found-reports.claim.show', compact('claim_detail','user', 'report', 'item_images'));
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

    public function update(Request $request, $user, $report){
        $request->validate([
            'detail_status' => 'in:pending,verified,rejected',
        ]);
        $user = User::where('id', $user)->first();
        $report = Report::where('id', $report)->first();
        if(!$user || !$report){
            abort(400);
        }
       DB::table('claim_user')->where('user_id', $user->id)->where('report_id', $report->id)->update([
            'detail_status'             =>              $request->input('detail_status'),
        ]);
        return redirect()->back()->with('alert.success', 'Claim status updated successfully');
    }
}

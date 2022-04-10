<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Report;
use App\Models\Reward;
use App\Models\User;
use Illuminate\Http\Request;

class RewardController extends Controller
{
    public function request($report){
       $report = Report::where('slug', $report)->first();
       abort_if(!$report, 404);
       if($report->report_type != Report::REPORT_TYPE_LOST || $report->verified_user === null || $report->verified_user != auth()->user()->id ){
           abort(401);
       }
    }

    public function sendReward($report){
        $report = Report::where('slug', $report)->first();
        abort_if(!$report, 404);
        if($report->reported_by != auth()->user()->id || $report->report_type != Report::REPORT_TYPE_LOST || $report->verified_user === null){
            abort(401);
        }
        if($report->reward){
            if($report->reward->owned_by === null){
                Reward::where('report_id', $report->id)->update([
                    'owned_by'      =>          $report->verified_user,
                ]);
                $user = User::where('id', $report->verified_user)->first();
                $user->balance = $user->balance + $report->reward->reward_amount;
                $user->update();
                return redirect()->back()->with('toast.success','Reward provided to '.$report->verifiedUser->first_name.' '.$report->verifiedUser->last_name);
            }
            return redirect()->back()->with('toast.error', 'Rewarded already provided to '.$report->verifiedUser->first_name.' '.$report->verifiedUser->last_name);
        }
        return redirect()->back()->with('toast.error', 'No reward to provide');

    }
}

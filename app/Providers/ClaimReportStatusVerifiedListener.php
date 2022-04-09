<?php

namespace App\Providers;

use App\Models\Report;
use App\Models\User;
use App\Notifications\ClaimReportStatusRejected;
use App\Notifications\ClaimReportStatusVerified;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;

class ClaimReportStatusVerifiedListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Providers\ClaimReportStatusVerifiedEvent  $event
     * @return void
     */
    public function handle(ClaimReportStatusVerifiedEvent $event)
    {
        $report = $event->report;
        $verified_user = $event->user;
        $rejected_user_id = DB::table('claim_user')->where('report_id', $report->id)
            ->where('report_status','!=', Report::REPORT_STATUS[1])->pluck('user_id');
        if($rejected_user_id){
            $rejected_user = User::whereIn('id', $rejected_user_id)->get();
            Notification::send($rejected_user, new ClaimReportStatusRejected($report));
        }
        Notification::send($verified_user, new ClaimReportStatusVerified($report));

    }
}

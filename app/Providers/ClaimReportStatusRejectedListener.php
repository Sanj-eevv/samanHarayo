<?php

namespace App\Providers;


use App\Notifications\ClaimReportStatusRejected;
use Illuminate\Support\Facades\Notification;


class ClaimReportStatusRejectedListener
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
     * @param  \App\Providers\ClaimReportStatusRejectedEvent  $event
     * @return void
     */
    public function handle(ClaimReportStatusRejectedEvent $event)
    {
        $report = $event->report;
        $rejected_user = $event->user;
        Notification::send($rejected_user, new ClaimReportStatusRejected($report));
    }
}

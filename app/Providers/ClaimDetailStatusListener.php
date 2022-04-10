<?php

namespace App\Providers;

use App\Models\Report;
use App\Notifications\DetailStatusRejected;
use App\Notifications\DetailStatusVerified;
use App\Providers\ClaimDetailStatusEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class ClaimDetailStatusListener
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
     * @param  \App\Providers\ClaimDetailStatusEvent  $event
     * @return void
     */
    public function handle(ClaimDetailStatusEvent $event)
    {
        $report = $event->report;
        $user = $event->user;
        $status = $event->status;
        if($status === Report::DETAIL_STATUS[1]){
            Notification::send($user, new DetailStatusVerified($report));
        }else{
            Notification::send($user, new DetailStatusRejected($report));
        }
    }
}

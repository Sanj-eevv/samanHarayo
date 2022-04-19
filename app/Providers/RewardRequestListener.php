<?php

namespace App\Providers;

use App\Models\User;
use App\Notifications\RewardRequest;
use Illuminate\Support\Facades\Notification;

class RewardRequestListener
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
     * @param  \App\Providers\RewardRequestEvent  $event
     * @return void
     */
    public function handle(RewardRequestEvent $event)
    {
        $report = $event->report;
        $user = User::where('id',$report->reported_by)->first();
        Notification::send($user, new RewardRequest($report));
    }
}

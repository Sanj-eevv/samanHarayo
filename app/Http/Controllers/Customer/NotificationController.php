<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Notifications\ClaimReportStatusRejected;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $notifications = $user->unreadNotifications;
        foreach ($notifications as $notification){
            if ($notification->type === "App\Notifications\ClaimReportStatusRejected" || $notification->type === "App\Notifications\DetailStatusRejected") {
                $notification['url'] = url('/').'/dashboard/claim/'.$notification->data['slug'];
                $notification['class'] = "alert-danger";
            }elseif ($notification->type === "App\Notifications\ClaimReportStatusVerified" || $notification->type === "App\Notifications\DetailStatusVerified"){
                $notification['url'] = url('/').'/dashboard/claim/'.$notification->data['slug'];
                $notification['class'] = "alert-success";
            }else{
                $notification['url'] = url('/').'/dashboard/report/'.$notification->data['slug'];
                $notification['class'] = "alert-info";
            }
        }
        return view('dashboard.current_user.notification.index', compact('notifications'));
    }

    public function markNotification(Request $request): \Illuminate\Http\Response
    {
        \auth()->user()
            ->unreadNotifications
            ->when($request->input('id'), function ($query) use ($request){
               return $query->where('id', $request->input('id'));
            })
        ->markAsRead();
        return response()->noContent();
    }
}


<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\Payment;
use App\Models\Photo;
use App\Models\Report;
use App\Models\Reward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        return view('front.checkout.index');
    }

    public function fulfillOrder(Request $request)
    {
        DB::transaction(function () use ($request) {
            // Data for reports table
            $report_data = session('lost_report_data');
            $report = Report::create($report_data);

            // Data for payments table
            $transactionId = $request->transaction_id;
            $total = $request->total;
            Payment::create([
                'report_id' => $report->id,
                'total' => $total,
                'transaction_id' => $transactionId,
            ]);

            // Data for rewards table
            Reward::create([
                'report_id'             =>          $report->id,
                'reward_amount'         =>          session('reward_amount'),
                'owned_by'              =>          null,
            ]);

            // Data for Location table
            $location_data = session('location_data');
            $location_data['report_id'] = $report->id;
            Location::create($location_data);

            // updating photo data
            $photos = Photo::where('report_id', null)->where('store_type', Photo::STORE_TYPE_TEMPORARY)->get();
            if($photos){
                foreach ($photos as $photo){
                    $photo->report_id = $report->id;
                    $photo->store_type = Photo::STORE_TYPE_PERMANENT;
                    $photo->save();
                }
            }

            $request->session()->forget(['location_data', 'reward_amount', 'lost_report_data']);

        });
        $user = Auth::user();
        if (is_null($user)) {
            return redirect()->route('front.index')->with('toast.error', 'Payment received but logged-in user not found!');
        }
        return redirect()->route('front.index')->with('toast.success', 'Report Successfully Recorded !!');

    }
}

<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use App\Models\ItemImage;
use App\Models\Location;
use App\Models\Payment;
use App\Models\Report;
use App\Models\Reward;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

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
//            $report =  $request->session()->pull('report');
            $report = session('report');
            $duration = session('duration');
            $report['verified'] = 1;
            $report = Report::create($report);
            $slug = $report->slug;
            $path = 'storage/uploads/report/'.$report->reported_by.'/temp_report/';

            /*
                Base directory for Storage:: is root directory defined in filesystem.php
                By default it is "storage/app"
            */
            if(File::exists($path.$slug)) {
                if (File::exists($path . $slug . '/item_image')) {
                    $files = Storage::files('/public/uploads/report/'.$report->reported_by.'/temp_report/'.$slug .'/item_image');
                    if($files){
                        Storage::makeDirectory('/public/uploads/report/'.$report->reported_by.'/item_image');
                        foreach ($files as $image) {
                            File::move(storage_path('app/'.$image), public_path('storage/uploads/report/'.$report->reported_by.'/item_image/'.basename($image)));
                            ItemImage::create([
                                'image' => basename($image),
                                'report_id' => $report->id,
                            ]);
                        }
                    }
                }
                if(File::exists($path . $slug . '/feature_image')) {
                    $file = Storage::files('/public/uploads/report/'.$report->reported_by.'/temp_report/'.$slug.'/feature_image');
                    if($file){
                        Storage::makeDirectory('/public/uploads/report/'.$report->reported_by.'/feature_image');
                        File::move(storage_path('app/'.$file[0]), public_path('storage/uploads/report/'.$report->reported_by.'/feature_image/'.basename($file[0])));
                        Feature::create([
                        'feature_image'         =>          basename($file[0]),
                        'report_id'             =>          $report->id,
                        'expiry_date'           =>          Carbon::today()->addDays($duration),
                        ]);
                    }
                }
            }
            // Data for payments table
            $transactionId = $request->transaction_id;
            $total = $request->total;
            Payment::create([
                'report_id'         => $report->id,
                'total'             => $total,
                'transaction_id'    => $transactionId,
            ]);
            // Data for rewards table
            if(session('reward')){
                Reward::create([
                    'report_id'             =>          $report->id,
                    'reward_amount'         =>          $request->session()->pull('reward'),
                    'owned_by'              =>          null,
                ]);
            }

            // Data for Location table
            $location_data = session('location');
            $location_data['report_id'] = $report->id;
            Location::create($location_data);

            $request->session()->forget(['location', 'reward', 'report', 'duration']);

        });
        $user = Auth::user();
        if (is_null($user)) {
            return redirect()->route('front.index')->with('toast.error', 'Payment received but logged-in user not found!');
        }
        return redirect()->route('front.index')->with('toast.success', 'Report Successfully Recorded !!');

    }

    public function prePaymentValidation(Request $request){
        if(!$request->has('require_identity')){
            return response()->json(['Something went wrong!!!']);
        }
        $require_identity = $request->input('require_identity');
        if($require_identity === "true"){
            $validator = Validator::make($request->all(), [
                'identity_front'                    =>              ['required','image', 'mimes:jpg,png,jepg', 'max:10240'],
                'identity_back'                     =>              ['required', 'image', 'mimes:jpg,png,jepg', 'max:10240'],
                'current_image'                     =>              ['required','image', 'mimes:jpg,png,jepg', 'max:10240'],
                'item_image'                        =>              ['nullable'],
                'item_image.*'                      =>              ['image', 'mimes:jpg,png,jepg', 'max:10240'],
                'description'                       =>              ['required', 'string', 'min:100'],
            ]);
            if( $validator->fails() )
            {
                return response()->json($validator->errors());
            }
        }
        $session_total = $require_identity === "true"? config('app.settings.per_report_price'): session('total');
        $total = $request->input('total');
        if (floatval($total) != floatval($session_total)) {
            return response()->json(['Price Discrepancy']);
        }

        return response()->json([
            'successful_validation' => 'success',
        ],200);

    }
}

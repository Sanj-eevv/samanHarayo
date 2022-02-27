<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Boost;
use App\Models\Location;
use App\Models\Payment;
use App\Models\Photo;
use App\Models\Report;
use App\Models\Reward;
use App\Rules\OnlyAsciiCharacters;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

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
            $report_data['verified'] = Report::STATUS_VERIFIED;
            $report = Report::create($report_data);

            // Data for payments table
            $transactionId = $request->transaction_id;
            $total = $request->total;
            Payment::create([
                'report_id'         => $report->id,
                'total'             => $total,
                'transaction_id'    => $transactionId,
            ]);

            // Data for rewards table
            Reward::create([
                'report_id'             =>          $report->id,
                'reward_amount'         =>          session('reward_amount'),
                'owned_by'              =>          null,
            ]);

            //Data for boosts table
            Boost::create([
                'boost_duration'        =>           session('feature_report_duration'),
                'report_id'             =>           $report->id,
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

    public function prePaymentValidation(Request $request){
        if(!$request->has('require_identity')){
            return response()->json(['Some thing went wrong!!!']);
        }
        $require_identity = $request->input('require_identity');
        if($require_identity === "true"){
            $validator = Validator::make($request->all(), [
                'identity_front'                  =>              ['required','image', 'mimes:jpg,png,jepg'],
                'identity_back'                   =>              ['required', 'image', 'mimes:jpg,png,jepg'],
                'current_photo'                   =>              ['required','image', 'mimes:jpg,png,jepg'],
                'product_photo'                   =>              ['nullable'],
                'description'                     =>              ['required', 'string', 'min:100'],
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

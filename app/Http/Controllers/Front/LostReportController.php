<?php

namespace App\Http\Controllers\Front;

use App\Helpers\SamanHarayoHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReportRequest;
use App\Models\category;
use App\Models\Location;
use App\Models\Photo;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LostReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $categories = category::all();
        return view('front.report.report-lost', compact('categories'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ReportRequest $request)
    {
            $product_photos = $request->file('product_photo');
            if($product_photos){
                foreach($product_photos as $image) {
                    $imageName = SamanHarayoHelper::renameImageFileUpload($image);
                    $image->storeAs(
                        'public/uploads/report', $imageName
                    );
                    Photo::create([
                        'photo'         =>          $imageName,
                        'report_id'     =>          null,
                        'store_type'    =>          Photo::STORE_TYPE_TEMPORARY,
                        'featured'      =>          Photo::NOT_FEATURED,
                    ]);
                }
            }
            $featured_image = $request->file('featured_image');
            if($featured_image){
                $imageName = SamanHarayoHelper::renameImageFileUpload($featured_image);
                $image->storeAs(
                    'public/uploads/featured', $imageName
                );
                Photo::create([
                    'photo'         =>          $imageName,
                    'report_id'     =>          null,
                    'store_type'    =>          Photo::STORE_TYPE_TEMPORARY,
                    'featured'      =>          Photo::FEATURED,
                ]);
            }

        if(session('lost_report_data')) {
            $request->session()->forget('lost_report_data');
        }
            $lost_report_data = [
                'name'                  =>              $request->input('name'),
                'description'           =>              $request->description,
                'category_id'           =>              $request->input('category'),
                'brand'                 =>              $request->input('brand'),
                'report_type'           =>              Report::REPORT_TYPE_LOST,
                'verified'              =>              Report::STATUS_PENDING,
                'contact_number'        =>              $request->input('phone'),
                'contact_email'         =>              $request->input('email') ?? auth()->user()->email,
            ];
            session(['lost_report_data' => $lost_report_data]);

             if(session('location_data')){
                 $request->session()->forget('location_data');
             }
            $location_data = [
                'latitude'              =>              $request->input('latitude'),
                'longitude'             =>              $request->input('longitude'),
                'address'               =>              $request->input('address'),
                'report_id'             =>              null,
            ];
            session(['location_data' => $location_data]);

            if(session('reward_amount')) {
                $request->session()->forget('reward_amount');
            }
            if($request->input('reward_amount')){
                session(['reward_amount' => $request->input('reward_amount')]);
            }

            if(session('feature_report_duration')) {
                $request->session()->forget('feature_report_duration');
            }
            if($request->input('feature_report_duration')){
                session(['feature_report_duration' => $request->input('feature_report_duration')]);
            }
              return redirect()->route('checkout.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

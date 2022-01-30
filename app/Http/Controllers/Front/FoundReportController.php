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

class FoundReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = category::all();
        return view('front.report.report-found',  compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReportRequest $request)
    {
        $report = Report::create([
            'name'                  =>              $request->input('name'),
            'description'           =>              $request->description,
            'category_id'           =>              $request->input('category'),
            'brand'                 =>              $request->input('brand'),
            'report_type'           =>              Report::REPORT_TYPE_FOUND,
            'status'                =>              Report::STATUS_PENDING,
            'contact_number'        =>              $request->input('phone'),
            'contact_email'         =>              $request->input('email') ?? auth()->user()->email,
        ]);
        $product_photos = $request->file('product_photo');
        if($product_photos){
            foreach($product_photos as $image) {
                $imageName = SamanHarayoHelper::renameImageFileUpload($image);
                $image->storeAs(
                    'public/uploads/report', $imageName
                );
                Photo::create([
                    'photo'         =>          $imageName,
                    'report_id'     =>          $report->id,
                    'store_type'    =>          Photo::STORE_TYPE_PERMANENT,
                    'featured'      =>          Photo::NOT_FEATURED,
                ]);
            }
        }
        Location::create([
            'latitude'              =>              $request->input('latitude'),
            'longitude'             =>              $request->input('longitude'),
            'address'               =>              $request->input('address'),
            'report_id'             =>              $report->id,
        ]);
        return redirect()->route('front.index')->with('toast.success', 'Report Waiting to be Verified!!');
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

<?php

namespace App\Http\Controllers\Front;

use App\Helpers\SamanHarayoHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\FoundReportRequest;
use App\Http\Requests\ReportRequest;
use App\Models\category;
use App\Models\ItemImage;
use App\Models\Location;
use App\Models\Photo;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FoundReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $categories = category::all();
        return view('front.report.found',  compact('categories'));
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(FoundReportRequest $request)
    {
        DB::transaction(function () use($request){
            $report = Report::create([
                'title'                     =>                  $request->input('title'),
                'slug'                      =>                  SamanHarayoHelper::uniqueSlugify($request->input('title'), Report::class, null, 'slug'),
                'description'               =>                  $request->description,
                'reported_by'               =>                  auth()->user()->id,
                'category_id'               =>                  $request->input('category'),
                'brand'                     =>                  $request->input('brand'),
                'report_type'               =>                  Report::REPORT_TYPE_FOUND,
                'verified'                  =>                  0,
                'contact_number'            =>                  $request->input('phone'),
                'contact_email'             =>                  $request->input('email') ?? auth()->user()->email,
            ]);
            $item_images = $request->file('item_image');
            foreach($item_images as $image) {
                $imageName = SamanHarayoHelper::renameImageFileUpload($image);
                $image->storeAs(
                    'public/uploads/report/'.$report->reported_by.'/item_image/', $imageName
                );
                ItemImage::create([
                    'image'     =>      $imageName,
                    'report_id' =>      $report->id,
                ]);
            }
            Location::create([
                'latitude'              =>              $request->input('latitude'),
                'longitude'             =>              $request->input('longitude'),
                'address'               =>              $request->input('address'),
                'report_id'             =>              $report->id,
            ]);
        });

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

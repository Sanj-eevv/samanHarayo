<?php

namespace App\Http\Controllers\Front;

use App\Helpers\SamanHarayoHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\LostReportRequest;
use App\Http\Requests\ReportRequest;
use App\Models\category;

use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

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
        return view('front.report.lost', compact('categories'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LostReportRequest $request)
    {
            $user_id = Auth::user()->id;
            $slug =  SamanHarayoHelper::uniqueSlugify($request->input('title'), Report::class, null, 'slug');
            $item_images = $request->file('item_image');
            $path = 'storage/uploads/report/'.$user_id.'temp_report/';
            if(File::exists($path.$slug)){
                File::deleteDirectory(public_path($path.$slug));
            }
            if($item_images){
                foreach($item_images as $image) {
                    $imageName = SamanHarayoHelper::renameImageFileUpload($image);
                    $image->storeAs(
                        'public/uploads/report/'.$user_id.'/temp_report/'.$slug.'/item_image/', $imageName
                    );
                }
            }

            $featured_image = $request->file('featured_image');
            if($featured_image){
                $imageName = SamanHarayoHelper::renameImageFileUpload($featured_image);
                $featured_image->storeAs(
                    'public/uploads/report/'.$user_id.'/temp_report/'.$slug.'/feature_image/', $imageName
                );
                $duration = $request->input('duration');
                if(session('duration')) {
                    $request->session()->forget('duration');
                }
                session(['duration' => $duration]);
            }

            if(session('report')) {
                $request->session()->forget('report');
            }
            $report = [
                'title'                     =>              $request->input('title'),
                'slug'                      =>              SamanHarayoHelper::uniqueSlugify($request->input('title'), Report::class, null, 'slug'),
                'description'               =>              $request->input('description'),
                'reported_by'               =>              $user_id,
                'category_id'               =>              $request->input('category'),
                'brand'                     =>              $request->input('brand'),
                'report_type'               =>              Report::REPORT_TYPE_LOST,
                'contact_number'            =>              $request->input('phone'),
                'contact_email'             =>              $request->input('email'),
            ];
            session(['report' => $report]);


             if(session('location')){
                 $request->session()->forget('location');
             }
            $location = [
                'latitude'              =>              $request->input('latitude'),
                'longitude'             =>              $request->input('longitude'),
                'address'               =>              $request->input('address'),
            ];
            session(['location' => $location]);

            if(session('reward')) {
                $request->session()->forget('reward');
            }
            if($request->input('reward')){
                session(['reward' => $request->input('reward')]);
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

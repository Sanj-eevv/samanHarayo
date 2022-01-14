<?php

namespace App\Http\Controllers\Front;

use App\Helpers\SamanHarayoHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\LostProductRequest;
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
        return view('front.report-lost', compact('categories'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function store(LostProductRequest $request)
    {

        DB::transaction(function () use ($request){
            $report = Report::create([
                'name'                  =>              $request->input('name'),
                'description'           =>              $request->description,
                'category_id'           =>              $request->input('category'),
                'brand'                 =>              $request->input('brand'),
                'report_type'           =>              Report::REPORT_TYPE,
                'contact_number'        =>              $request->input('phone'),
                'contact_email'         =>              $request->input('email') ?? auth()->user()->email,
            ]);

            Location::create([
                'latitude'              =>              $request->input('latitude'),
                'longitude'             =>              $request->input('longitude'),
                'address'               =>              $request->input('address'),
                'report_id'             =>              $report->id,
            ]);

            $product_photos = $request->file('product_photo');
            foreach($product_photos as $image) {
                $imageName = SamanHarayoHelper::renameImageFileUpload($image);
                $image->storeAs(
                    'public/uploads/report', $imageName
                );
                Photo::create([
                    'photo'         =>          $imageName,
                    'report_id'     =>          $report->id
                ]);
            }

        });

      return redirect()->route('front.index')->with('toast.success', 'Report Successfully Recorded !!');
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

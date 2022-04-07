<?php

namespace App\Http\Controllers\Front;

use App\Helpers\SamanHarayoHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\IdentityRequest;
use App\Models\ItemImage;
use App\Models\Photo;
use App\Models\Report;
use App\Models\User;
use App\Models\UserDetail;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class IdentityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function index(Request $request)
    {
        $report = $request->input('report');
        $report = Report::where('slug', $report)->first();
        if(!$report){
            abort(404);
        }
        if($report->reported_by === \auth()->user()->id){
            return redirect()->back()->with('toast.error', 'Sorry! You cannot claim your own reported items');
        }
        $user = Auth::user();
        $verified = false;
        $need_current_image = true;
        if($user->verified === User::VERIFIED){
            $verified = true;
        }
        /* TODO: This submonths value should be retrieve from the settings table */
        if($user->updated_at > Carbon::now()->subMonths(3) && $user->current_image){
            $need_current_image = false;
        }
        return view('front.identity',compact('report', 'verified', 'need_current_image'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(IdentityRequest $request)
    {
        $report = $request->input('report');
        $report = Report::where('slug', $report)->first();
        if(!$report || !$report->veified || $report->verified_user != null){
            abort(404);
        }
        if($report->reported_by === \auth()->user()->id){
            return redirect()->back()->with('toast.error', 'Sorry! You cannot claim your own reported items');
        }
        \DB::beginTransaction();
         try{
//        Adding new row in images table. This row basically gives images of claimed report and the user who has claimed the report.
            $item_images = $request->file('item_image');
            $user = Auth::user();
            if($item_images){
                foreach ($item_images as $image) {
                    $imageName = SamanHarayoHelper::renameImageFileUpload($image);
                    $image->storeAs(
                        'public/uploads/report/' . $user->id . '/claimed/', $imageName
                    );
                    ItemImage::create([
                        'image' => $imageName,
                        'report_id' => $report->id,
                        'claimed_by' => $user->id,
                        'claim'     => 1,
                    ]);
                }
            }
//        Syncing data in pivot table claim_user.
            $description = $request->input('description');
            $detail_status = Report::DETAIL_STATUS;
            $report_status = Report::REPORT_STATUS;

            /** detail_status[0] => pending */
             /** report_status[0] => pending */
            $user->claims()->attach($report->id,['description'=>$description, 'detail_status'=>$detail_status[0], 'report_status'=>$report_status[0]]);

//        These are the image for user identification.
            $current_image = $request->file('current_image');;
            if($current_image){
//                Deleting old current image if exitsts
                /** Storage points to storage/app */
                if($user->current_image){
                        Storage::delete('public/uploads/users/'.$user->id.'/'.$user->current_image);
                }
                $current_image_name = SamanHarayoHelper::renameImageFileUpload($current_image);
                $current_image->storeAs(
                    'public/uploads/users/' . $user->id, $current_image_name
                );
                $user->current_image = $current_image_name;
                $user->updated_at = now();
                $user->save();
            }
            $identity_front = $request->file('identity_front');
            $identity_back = $request->file('identity_back');
            if($identity_front || $identity_back){
                $identity_front_name = SamanHarayoHelper::renameImageFileUpload($identity_front);
                $identity_back_name = SamanHarayoHelper::renameImageFileUpload($identity_back);

                $identity_front->storeAs(
                    'public/uploads/users/' . $user->id, $identity_front_name
                );
                $identity_back->storeAs(
                    'public/uploads/users/' . $user->id, $identity_back_name
                );
                $user->verified = User::VERIFIED;
                $user->identity_front = $identity_front_name;
                $user->identity_back = $identity_back_name;
                $user->updated_at = now();
                $user->save();
            }
             \DB::commit();
        }catch (QueryException $e){
             return redirect()->route('front.index')->with('toast.error', 'Duplicate Entry !!');
         }
        return redirect()->route('front.index')->with('toast.success', 'Report Claimed Successfully !!');
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

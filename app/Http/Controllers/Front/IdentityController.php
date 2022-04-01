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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IdentityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $report = $request->input('report');
        if(!$report){
            abort(404);
        }
        $report = Report::where('slug', $report)->first();
        if(!$report){
            abort(404);
        }
        $user = User::with('userDetail')->find(Auth::id());
        $verified = false;
        $need_current_image = false;
        if($user->userDetail->verified === UserDetail::VERIFIED){
            $verified = true;
        }
        if($user->userDetail->updated_at < Carbon::now()->subMonths(3)){
            $need_current_image = true;
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
        if(!$report){
            abort(404);
        }
        $report = Report::where('slug', $report)->first();
        if(!$report){
            abort(404);
        }

        \DB::transaction(function() use($report, $request){
//        Adding new row in images table. This row basically gives images of claimed report and the user who has claimed the report.
            $item_images = $request->file('item_image');
            $user = Auth::user();
            $user_has_detail = UserDetail::where('user_id', $user->id)->first();

            if($item_images){
                foreach ($item_images as $image) {
                    $imageName = SamanHarayoHelper::renameImageFileUpload($image);
                    $image->storeAs(
                        'public/uploads/report/' . $report->reported_by . '/claimed/', $imageName
                    );
                    ItemImage::create([
                        'image' => $imageName,
                        'report_id' => $report->id,
                        'claimed_by' => $user->id,
                    ]);
                }
            }
//        Syncing data in pivot table claim_user.
            $description = $request->input('description');
            $user->claims()->attach($report->id,['description'=>$description]);

//        These are the image for user identification. It will be stored in user details page.
            $current_image = $request->file('current_image');

            $current_image_name = null;
            $identity_front_name = null;
            $identity_back_name = null;

            if($current_image){
                $current_image_name = SamanHarayoHelper::renameImageFileUpload($current_image);
                $current_image->storeAs(
                    'public/uploads/report/' . $user->id . '/user_detail/', $current_image_name
                );
                if($user_has_detail){
                    $user_has_detail->current_image = $current_image_name;
                    $user->updated_at = now();
                    $user_has_detail->save();
                }
            }
            $identity_front = $request->file('identity_front');
            $identity_back = $request->file('identity_back');

            if($identity_front || $identity_back){
                $identity_front_name = SamanHarayoHelper::renameImageFileUpload($identity_front);
                $identity_back_name = SamanHarayoHelper::renameImageFileUpload($identity_back);

                $identity_front->storeAs(
                    'public/uploads/report/' . $user->id . '/user_detail/', $identity_front_name
                );

                $identity_back->storeAs(
                    'public/uploads/report/' . $user->id . '/user_detail/', $identity_back_name
                );
                UserDetail::create([
                    'verified'          => UserDetail::VERIFIED,
                    'current_image'     => $current_image_name,
                    'identity_front'    => $identity_front_name,
                    'identity_back'     => $identity_back_name,
                    'user_id'           =>  $user->id,
                ]);
            }

        });
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

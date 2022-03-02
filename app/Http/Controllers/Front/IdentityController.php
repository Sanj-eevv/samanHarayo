<?php

namespace App\Http\Controllers\Front;

use App\Helpers\SamanHarayoHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\IdentityRequest;
use App\Models\Photo;
use App\Models\UserDetail;
use Illuminate\Http\Request;

class IdentityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        return view('front.identity');
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
    public function store(Request $request)
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
                ]);
            }
        }
        $current_photo = $request->file('current_photo');
        $identity_front = $request->file('identity_front');
        $identity_back = $request->file('identity_back');

        $current_photo_name = SamanHarayoHelper::renameImageFileUpload($current_photo);
        $identity_front_name = SamanHarayoHelper::renameImageFileUpload($identity_front);
        $identity_back_name = SamanHarayoHelper::renameImageFileUpload($identity_back);
        $current_photo->storeAs(
                'public/uploads/featured', $current_photo_name
        );
        $identity_front->storeAs(
            'public/uploads/featured', $identity_front_name
        );
        $identity_back->storeAs(
            'public/uploads/featured', $identity_back_name
        );
            UserDetail::create([
                'current_photo'         =>          $current_photo,
                'identity_front'        =>          $identity_front,
                'identity_back'             =>          $identity_back,
            ]);
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

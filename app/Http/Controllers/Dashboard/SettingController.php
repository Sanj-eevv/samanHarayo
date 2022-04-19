<?php

namespace App\Http\Controllers\Dashboard;

use App\Helpers\SamanHarayoHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\SettingRequest;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->middleware(['auth','isAdmin']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Setting::all();
        $stripe_environments = Setting::STRIPE_ENVIRONMENT;
        $app_environments = ['test', 'live'];
        return view('dashboard.settings.index', compact('settings','stripe_environments', 'app_environments'));
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(SettingRequest $request)
    {
        $settings = Setting::all();
        \DB::transaction(function () use ($request, $settings) {
            $app_logo = $settings->where('key_name', 'app_logo')->first()->key_value;
            if ($request->hasFile('app_logo')) {
                @unlink(public_path('storage/uploads/settings/' . $app_logo));
                $imageName = SamanHarayoHelper::renameImageFileUpload($request->file('app_logo'));
                $request->file('app_logo')->storeAs(
                    'public/uploads/settings', $imageName
                );
                $app_logo = $imageName;
            }
            Setting::upsert([
                [
                    'key_name' => 'app_name',
                    'key_value' => $request->input('app_name') ?? null,
                    'updated_at' => now()
                ],
                [
                    'key_name' => 'admin_email',
                    'key_value' => $request->input('admin_email') ?? null,
                    'updated_at' => now()
                ]
                ,
                [
                    'key_name' => 'company_address',
                    'key_value' => $request->input('company_address') ?? null,
                    'updated_at' => now()
                ],
                [
                       'key_name' => 'contact_phone',
                       'key_value' => $request->input('contact_phone') ?? null,
                       'updated_at' => now()
                ],
                [
                    'key_name' => 'contact_email',
                    'key_value' => $request->input('contact_email') ?? null,
                    'updated_at' => now()
                ],
                [
                    'key_name' => 'per_feature_price',
                    'key_value' => $request->input('per_feature_price') ?? null,
                    'updated_at' => now()
                ],
                [
                    'key_name' => 'max_feature_days',
                    'key_value' => $request->input('max_feature_days') ?? null,
                    'updated_at' => now()
                ],
                [
                    'key_name' => 'per_report_price',
                    'key_value' => $request->input('per_report_price') ?? null,
                    'updated_at' => now()
                ],
                [
                    'key_name' => 'app_environment',
                    'key_value' => $request->input('app_environment') ?? null,
                    'updated_at' => now()
                ],
                [
                    'key_name' => 'stripe_test_publishable_key',
                    'key_value' => $request->input('stripe_test_publishable_key') ?? null,
                    'updated_at' => now()
                ],
                [
                    'key_name' => 'stripe_test_secret_key',
                    'key_value' => $request->input('stripe_test_secret_key') ?? null,
                    'updated_at' => now()
                ],
                [
                    'key_name' => 'stripe_live_publishable_key',
                    'key_value' => $request->input('stripe_live_publishable_key') ?? null,
                    'updated_at' => now()
                ],
                [
                    'key_name' => 'stripe_live_secret_key',
                    'key_value' => $request->input('stripe_live_secret_key') ?? null,
                    'updated_at' => now()
                ],
                [
                    'key_name' => 'paypal_test_client_id',
                    'key_value' => $request->input('paypal_test_client_id') ?? null,
                    'updated_at' => now()
                ],
                [
                    'key_name' => 'paypal_test_secret_key',
                    'key_value' => $request->input('paypal_test_secret_key') ?? null,
                    'updated_at' => now()
                ],
                [
                    'key_name' => 'paypal_live_client_id',
                    'key_value' => $request->input('paypal_live_client_id') ?? null,
                    'updated_at' => now()
                ],
                [
                    'key_name' => 'paypal_live_secret_key',
                    'key_value' => $request->input('paypal_live_secret_key') ?? null,
                    'updated_at' => now()
                ],
                [
                    'key_name' => 'app_logo',
                    'key_value' => $app_logo,
                    'updated_at' => now()
                ],
            ], ['key_name'], ['key_value', 'updated_at']);

            //updating settings cached value
            Setting::updateCachedSettingsData();

        });

        return redirect()->back()->with('alert.success', 'Setting Successfully Updated !!');
    }

}

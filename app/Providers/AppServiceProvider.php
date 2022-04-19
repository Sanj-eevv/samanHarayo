<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Guard $auth)
    {
        Schema::defaultStringLength(191);
        Model::preventLazyLoading(!$this->app->isProduction());
        if (Schema::hasTable('settings')) {
            $settings = Setting::getCachedValue();
            if($settings){
                config([
                    'app.name'                                      => $settings['app_name'] ?? null,
                    'app.settings.app_logo'                         => $settings['app_logo'] ?? null,
                    'app.settings.admin_email'                      => $settings['admin_email'] ?? null,
                    'app.settings.contact_phone'                    => $settings['contact_phone'] ?? null,
                    'app.settings.contact_email'                    => $settings['contact_email'] ?? null,
                    'app.settings.company_address'                  => $settings['company_address'] ?? null,
                    'app.settings.per_feature_price'                => $settings['per_feature_price'] ?? null,
                    'app.settings.max_feature_days'                 => $settings['max_feature_days'] ?? null,
                    'app.settings.per_report_price'                 => $settings['per_report_price'] ?? null,
                    'app.settings.app_environment'                  => $settings['app_environment'] ?? null,
                    'app.settings.stripe_test_publishable_key'      => $settings['stripe_test_publishable_key'] ?? null,
                    'app.settings.stripe_test_secret_key'           => $settings['stripe_test_secret_key'] ?? null,
                    'app.settings.stripe_live_publishable_key'      => $settings['stripe_live_publishable_key'] ?? null,
                    'app.settings.stripe_live_secret_key'           => $settings['stripe_live_secret_key'] ?? null,
                    'app.settings.paypal_test_client_id'            => $settings['paypal_test_client_id'] ?? null,
                    'app.settings.paypal_test_secret_key'           => $settings['paypal_test_secret_key'] ?? null,
                    'app.settings.paypal_live_client_id'            => $settings['paypal_live_client_id'] ?? null,
                    'app.settings.paypal_live_secret_key'           => $settings['stripe_live_secret_key'] ?? null,
                ]);
                if (config('app.settings.app_environment') === "live") {
                    config([
                        'app.settings.stripe_publishable_key'      => $settings['stripe_live_publishable_key'] ?? null,
                        'app.settings.stripe_secret_key'           => $settings['stripe_live_secret_key'] ?? null,
                    ]);
                } else {
                    config([
                        'app.settings.stripe_publishable_key'      => $settings['stripe_test_publishable_key'] ?? null,
                        'app.settings.stripe_secret_key'           => $settings['stripe_test_secret_key'] ?? null,
                    ]);
                }
                if (config('app.settings.app_environment') === "live") {
                    config([
                        'app.settings.paypal_client_id'             => $settings['paypal_live_client_id'] ?? null,
                        'app.settings.paypal_secret_key'            => $settings['paypal_live_secret_key'] ?? null,
                    ]);
                } else {
                    config([
                        'app.settings.paypal_client_id'             => $settings['paypal_test_client_id'] ?? null,
                        'app.settings.paypal_secret_key'            => $settings['paypal_test_secret_key'] ?? null,
                    ]);
                }
            }
        }

        $notification_count = 0;
        view()->composer('*', function($view) use ($auth, &$notification_count) {
            if (Schema::hasTable('notifications') && Auth::check()) {
                $user = Auth::user();
                $notification_count = $user->unreadNotifications->count();
            }
            \View::share('GLOBAL_CUSTOMER_NOTIFICATION', $notification_count);
        });
    }
}

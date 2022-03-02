<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Database\Eloquent\Model;
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
    public function boot()
    {
        Schema::defaultStringLength(191);
        Model::preventLazyLoading(!$this->app->isProduction());
        if (Schema::hasTable('settings')) {
            $settings = Setting::getCachedValue();
            if($settings){
                config([
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
    }
}

<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::upsert([
            [
                'key_name'                              => 'app_name',
                'key_value'                             => 'SamanHarayo',
                'type'                                  => 'text',
                'availability'                          => 'all',
                'created_at'                            => now(),
                'updated_at'                            => now()
            ],
            [
                'key_name'                              => 'admin_email',
                'key_value'                             => 'sanjeevvsanjeev1@gmail.com',
                'type'                                  => 'text',
                'availability'                          => 'all',
                'created_at'                            => now(),
                'updated_at'                            => now()
            ],
            [
                'key_name'                              => 'per_report_price',
                'key_value'                             => '40',
                'type'                                  => 'text',
                'availability'                          => 'all',
                'created_at'                            => now(),
                'updated_at'                            => now()
            ],
            [
                'key_name'                              => 'per_feature_report_price',
                'key_value'                             => '80',
                'type'                                  => 'text',
                'availability'                          => 'all',
                'created_at'                            => now(),
                'updated_at'                            => now()
            ],
            [
                'key_name'                              => 'app_environment',
                'key_value'                             => 'test',
                'type'                                  => 'text',
                'availability'                          => 'all',
                'created_at'                            => now(),
                'updated_at'                            => now()
            ],
            [
                'key_name'                              => 'stripe_test_publishable_key',
                'key_value'                             => 'pk_test_51JSbv0Db5yVTJO3QwvVS4hgPRpm99ue6z5m9YbSu0okir1QsvDMLCUufP1PysmmwZKHYdjGMKOMh0oIf3JkE0tBT00BMFDgbJn',
                'type'                                  => 'text',
                'availability'                          => 'all',
                'created_at'                            => now(),
                'updated_at'                            => now()
            ],
            [
                'key_name'                              => 'stripe_test_secret_key',
                'key_value'                             => 'sk_test_51JSbv0Db5yVTJO3Qa5KoH7zPcmwaGYTA8EetolGSAkaNFygGBsCb96HtYP5ClBzrA2KTUlu6YhQUuibvja04hUpw00R7Bq2G6e',
                'type'                                  => 'text',
                'availability'                          => 'all',
                'created_at'                            => now(),
                'updated_at'                            => now()
            ],
            [
                'key_name'                              => 'stripe_live_publishable_key',
                'key_value'                             => null,
                'type'                                  => 'text',
                'availability'                          => 'all',
                'created_at'                            => now(),
                'updated_at'                            => now()
            ],
            [
                'key_name'                              => 'stripe_live_secret_key',
                'key_value'                             => null,
                'type'                                  => 'text',
                'availability'                          => 'all',
                'created_at'                            => now(),
                'updated_at'                            => now()
            ],
            [
                'key_name'                              => 'paypal_test_client_id',
                'key_value'                             => 'ARB8Ix-XXIx89Cv24GhgJK2Xk73Mvl2atMIBKPmKRpWcX7lraOYk1X90r8DAJSb5Wl8dIwSmSZa5cB1t',
                'type'                                  => 'text',
                'availability'                          => 'all',
                'created_at'                            => now(),
                'updated_at'                            => now()
            ],
            [
                'key_name'                              => 'paypal_test_secret_key',
                'key_value'                             => 'EOyjRcfpfzuYpKpCPmS23q9ZjeFUuDXs0njoYW304XrlXrC7YQX_79SzUVBQwCwTKOEmZL1TPxiaqcyz',
                'type'                                  => 'text',
                'availability'                          => 'all',
                'created_at'                            => now(),
                'updated_at'                            => now()
            ],
            [
                'key_name'                              => 'paypal_live_client_id',
                'key_value'                             => null,
                'type'                                  => 'text',
                'availability'                          => 'all',
                'created_at'                            => now(),
                'updated_at'                            => now()
            ],
            [
                'key_name'                              => 'paypal_live_secret_key',
                'key_value'                             => null,
                'type'                                  => 'text',
                'availability'                          => 'all',
                'created_at'                            => now(),
                'updated_at'                            => now()
            ],

        ],['key_name'],['key_value','type', 'availability', 'updated_at']);
    }
}

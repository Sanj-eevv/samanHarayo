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
                'key_name'                              => 'app_logo',
                'key_value'                             => 'logo.png',
                'type'                                  => 'image',
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
                'key_name'                              => 'company_address',
                'key_value'                             => 'Itahari-5, Nepal',
                'type'                                  => 'text',
                'availability'                          => 'all',
                'created_at'                            => now(),
                'updated_at'                            => now()
            ],
            [
                'key_name'                              => 'contact_email',
                'key_value'                             => 'samanharayo@test.com',
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
                'key_name'                              => 'per_feature_price',
                'key_value'                             => '80',
                'type'                                  => 'text',
                'availability'                          => 'all',
                'created_at'                            => now(),
                'updated_at'                            => now()
            ],
            [
                'key_name'                              => 'max_feature_days',
                'key_value'                             => '30',
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
                'key_value'                             => "pk_live_xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx",
                'type'                                  => 'text',
                'availability'                          => 'all',
                'created_at'                            => now(),
                'updated_at'                            => now()
            ],
            [
                'key_name'                              => 'stripe_live_secret_key',
                'key_value'                             => 'sk_live_xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx',
                'type'                                  => 'text',
                'availability'                          => 'all',
                'created_at'                            => now(),
                'updated_at'                            => now()
            ],
            [
                'key_name'                              => 'paypal_test_client_id',
                'key_value'                             => 'AfMF7kQ2_eQZ-Wmu2W0WsrrUo7rY1rvu8UMz4YM_km71ObWKqYQLrJSeawS7ZE4BFhBYUYTplIbcg9ai',
                'type'                                  => 'text',
                'availability'                          => 'all',
                'created_at'                            => now(),
                'updated_at'                            => now()
            ],
            [
                'key_name'                              => 'paypal_test_secret_key',
                'key_value'                             => 'EKDX-IDAf2bw8rkjAaYkshUufviii7oSYtMDtH1_1f99EdBe1GOGE6rekFpuDX6r7SOXXfDqDvikNLmO',
                'type'                                  => 'text',
                'availability'                          => 'all',
                'created_at'                            => now(),
                'updated_at'                            => now()
            ],
            [
                'key_name'                              => 'paypal_live_client_id',
                'key_value'                             => 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx',
                'type'                                  => 'text',
                'availability'                          => 'all',
                'created_at'                            => now(),
                'updated_at'                            => now()
            ],
            [
                'key_name'                              => 'paypal_live_secret_key',
                'key_value'                             => 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx',
                'type'                                  => 'text',
                'availability'                          => 'all',
                'created_at'                            => now(),
                'updated_at'                            => now()
            ],

        ],['key_name'],['key_value','type', 'availability', 'updated_at']);
    }
}

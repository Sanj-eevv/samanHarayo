<?php

namespace Database\Seeders;

use App\Models\Feature;
use Illuminate\Database\Seeder;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Feature::upsert([
            [
                'feature_image'     =>          '1.jpg',
                'report_id'         =>          1,
                'expiry_date'       =>          '2023-04-25 08:04:26',
                'created_at'        =>          now(),
                'updated_at'        =>          now(),
            ],
            [
                'feature_image'     =>          '2.avif',
                'report_id'         =>          5,
                'expiry_date'       =>          '2024-04-25 08:04:26',
                'created_at'        =>          now(),
                'updated_at'        =>          now(),
            ],
            [
                'feature_image'     =>          '3.jpg',
                'report_id'         =>          3,
                'expiry_date'       =>          '2033-04-25 08:04:26',
                'created_at'        =>          now(),
                'updated_at'        =>          now(),
            ]
        ],[],[]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Boost;
use Illuminate\Database\Seeder;

class BoostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Boost::upsert([
            [
                'report_id'             =>              5,
                'boost_duration'        =>              8,
                'created_at'            =>              now(),
                'updated_at'            =>              now(),
            ],
            [
                'report_id'             =>              6,
                'boost_duration'        =>              2,
                'created_at'            =>              now(),
                'updated_at'            =>              now(),
            ],
            [
                'report_id'             =>              2,
                'boost_duration'        =>              15,
                'created_at'            =>              now(),
                'updated_at'            =>              now(),
            ]
        ],['report_id'],['updated_at', 'boost_duration']);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Reward;
use Illuminate\Database\Seeder;

class RewardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Reward::upsert([
           [
               'reward_amount'             =>          100,
               'report_id'                 =>          1,
               'owned_by'                  =>          null,
               'created_at'                =>          now(),
               'updated_at'                =>          now()
           ],
            [
                'reward_amount'             =>          100,
                'report_id'                 =>          2,
                'owned_by'                  =>          null,
                'created_at'                =>          now(),
                'updated_at'                =>          now()
            ],
            [
                'reward_amount'             =>          400,
                'report_id'                 =>          3,
                'owned_by'                  =>          null,
                'created_at'                =>          now(),
                'updated_at'                =>          now()
            ],
            [
                'reward_amount'             =>          100,
                'report_id'                 =>          4,
                'owned_by'                  =>          null,
                'created_at'                =>          now(),
                'updated_at'                =>          now()
            ]
        ],[],[]);
    }
}

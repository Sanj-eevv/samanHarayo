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
                'report_id'             =>              5,
                'reward_amount'         =>              12.00,
                'owned_by'              =>              null,
                'created_at'            =>              now(),
                'updated_at'            =>              now(),
            ],
            [
                'report_id'             =>              6,
                'reward_amount'         =>              0.0,
                'owned_by'              =>              null,
                'created_at'            =>              now(),
                'updated_at'            =>              now(),
            ],
        ],['report_id'],['updated_at', 'reward_amount']);
    }
}

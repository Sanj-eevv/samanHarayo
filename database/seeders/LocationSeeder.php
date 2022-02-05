<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Location::upsert([
            [
                'latitude'          =>          '28.398481154356304',
                'longitude'         =>          '84.12435132275388',
                'address'           =>          '94XF+MM7, Namarjung, Kaski, Gandaki Province, Nepal, 33700',
                'report_id'         =>          1,
                'created_at'        =>          now(),
                'updated_at'        =>          now(),
            ],
            [
                'latitude'          =>          '28.427168001113916',
                'longitude'         =>          '84.08040601025388',
                'address'           =>          'C3GJ+V5, Parche, Kaski, Gandaki Province, Nepal, 33700',
                'report_id'         =>           2,
                'created_at'        =>          now(),
                'updated_at'        =>          now(),
            ],
            [
                'latitude'          =>          '26.6646381',
                'longitude'         =>          '87.27178099999999',
                'address'           =>          'Itahari, Sunsari, Province No. 1, Nepal',
                'report_id'         =>          3,
                'created_at'        =>          now(),
                'updated_at'        =>          now(),
            ],
            [
                'latitude'          =>          '26.806496',
                'longitude'         =>          '87.28462619999999',
                'address'           =>          'Dharan, Sunsari, Province No. 1, Nepal',
                'report_id'         =>          4,
                'created_at'        =>          now(),
                'updated_at'        =>          now(),
            ],
            [
                'latitude'          =>          '27.0410218',
                'longitude'         =>          '88.2662745',
                'address'           =>          'Darjeeling, Darjeeling, West Bengal, India',
                'report_id'         =>          5,
                'created_at'        =>          now(),
                'updated_at'        =>          now(),
            ],
            [
                'latitude'          =>          '26.6716598',
                'longitude'         =>          '87.6679765',
                'address'           =>          'Damak, Province No. 1, Nepal',
                'report_id'         =>          6,
                'created_at'        =>          now(),
                'updated_at'        =>          now(),
            ],
        ],['report_id'],['updated_at', 'created_at', 'address', 'latitude', 'longitude']);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Photo;
use Illuminate\Database\Seeder;

class PhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Photo::upsert([
            [
                'photo'             =>              'samsunggg1.jpg',
                'report_id'         =>              1,
                'store_type'        =>              'perm',
                'featured'          =>              'no',
                'created_at'        =>              now(),
                'updated_at'        =>              now(),
            ],
            [
                'photo'             =>              'samsung1.png',
                'report_id'         =>              1,
                'store_type'        =>              'perm',
                'featured'          =>              'no',
                'created_at'        =>              now(),
                'updated_at'        =>              now(),
            ],
            [
                'photo'             =>              'samsungg1.jepg',
                'report_id'         =>              1,
                'store_type'        =>              'perm',
                'featured'          =>              'no',
                'created_at'        =>              now(),
                'updated_at'        =>              now(),
            ],
            [
                'photo'             =>              'laptoppp5.png',
                'report_id'         =>              2,
                'store_type'        =>              'perm',
                'featured'          =>              'no',
                'created_at'        =>              now(),
                'updated_at'        =>              now(),
            ],
            [
                'photo'             =>              'laptopp5.png',
                'report_id'         =>              2,
                'store_type'        =>              'perm',
                'featured'          =>              'no',
                'created_at'        =>              now(),
                'updated_at'        =>              now(),
            ],
            [
                'photo'             =>              'laptop5.png',
                'report_id'         =>              2,
                'store_type'        =>              'perm',
                'featured'          =>              'no',
                'created_at'        =>              now(),
                'updated_at'        =>              now(),
            ],
            [
                'photo'             =>              'dell5.jpg',
                'report_id'         =>              2,
                'store_type'        =>              'perm',
                'featured'          =>              'yes',
                'created_at'        =>              now(),
                'updated_at'        =>              now(),
            ],
            [
                'photo'             =>              'atmcard.jpg',
                'report_id'         =>              2,
                'store_type'        =>              'perm',
                'featured'          =>              'no',
                'created_at'        =>              now(),
                'updated_at'        =>              now(),
            ],
            [
                'photo'             =>              'atmcardd.jpg',
                'report_id'         =>              2,
                'store_type'        =>              'perm',
                'featured'          =>              'no',
                'created_at'        =>              now(),
                'updated_at'        =>              now(),
            ],
            [
                'photo'             =>              'atmmm.jpg',
                'report_id'         =>              2,
                'store_type'        =>              'perm',
                'featured'          =>              'no',
                'created_at'        =>              now(),
                'updated_at'        =>              now(),
            ],
            [
                'photo'             =>              'goldringg4.png',
                'report_id'         =>              4,
                'store_type'        =>              'perm',
                'featured'          =>              'no',
                'created_at'        =>              now(),
                'updated_at'        =>              now(),
            ],
            [
                'photo'             =>              'goldringgg4.jepg',
                'report_id'         =>              4,
                'store_type'        =>              'perm',
                'featured'          =>              'no',
                'created_at'        =>              now(),
                'updated_at'        =>              now(),
            ],
            [
                'photo'             =>              'goldring5.jepg',
                'report_id'         =>              4,
                'store_type'        =>              'perm',
                'featured'          =>              'no',
                'created_at'        =>              now(),
                'updated_at'        =>              now(),
            ],
            [
                'photo'             =>              '2.jpg',
                'report_id'         =>              5,
                'store_type'        =>              'perm',
                'featured'          =>              'yes',
                'created_at'        =>              now(),
                'updated_at'        =>              now(),
            ],
            [
                'photo'             =>              'macc5.png',
                'report_id'         =>              5,
                'store_type'        =>              'perm',
                'featured'          =>              'no',
                'created_at'        =>              now(),
                'updated_at'        =>              now(),
            ],
            [
                'photo'             =>              'mac5.png',
                'report_id'         =>              5,
                'store_type'        =>              'perm',
                'featured'          =>              'no',
                'created_at'        =>              now(),
                'updated_at'        =>              now(),
            ],
            [
                'photo'             =>              'featured6.png',
                'report_id'         =>              6,
                'store_type'        =>              'perm',
                'featured'          =>              'yes',
                'created_at'        =>              now(),
                'updated_at'        =>              now(),
            ],
            [
                'photo'             =>              'report6.png',
                'report_id'         =>              6,
                'store_type'        =>              'perm',
                'featured'          =>              'no',
                'created_at'        =>              now(),
                'updated_at'        =>              now(),
            ],
            [
                'photo'             =>              'reportt6.png',
                'report_id'         =>              6,
                'store_type'        =>              'perm',
                'featured'          =>              'no',
                'created_at'        =>              now(),
                'updated_at'        =>              now(),
            ],
            [
                'photo'             =>              'reporttt6.png',
                'report_id'         =>              6,
                'store_type'        =>              'perm',
                'featured'          =>              'no',
                'created_at'        =>              now(),
                'updated_at'        =>              now(),
            ],


        ], ['photo'], ['report_id', 'store_type', 'featured', 'updated_at']);
    }
}

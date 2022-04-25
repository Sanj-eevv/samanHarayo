<?php

namespace Database\Seeders;

use App\Models\ItemImage;
use Illuminate\Database\Seeder;

class ItemImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ItemImage::upsert([
            [
                'image'         =>          '1.jpg',
                'report_id'     =>          1,
                'claim'         =>          0,
                'claimed_by'    =>          null,
                'created_at'    =>          now(),
                'updated_at'    =>          now(),
            ],
            [
                'image'         =>          '11.jpg',
                'report_id'     =>          1,
                'claim'         =>          0,
                'claimed_by'    =>          null,
                'created_at'    =>          now(),
                'updated_at'    =>          now(),
            ],
            [
                'image'         =>          '4.jpg',
                'report_id'     =>          2,
                'claim'         =>          0,
                'claimed_by'    =>          null,
                'created_at'    =>          now(),
                'updated_at'    =>          now(),
            ],
            [
                'image'         =>          '5.jpg',
                'report_id'     =>          2,
                'claim'         =>          0,
                'claimed_by'    =>          null,
                'created_at'    =>          now(),
                'updated_at'    =>          now(),
            ],
            [
                'image'         =>          '6.jpg',
                'report_id'     =>          3,
                'claim'         =>          0,
                'claimed_by'    =>          null,
                'created_at'    =>          now(),
                'updated_at'    =>          now(),
            ],
            [
                'image'         =>          '8.jpg',
                'report_id'     =>          4,
                'claim'         =>          0,
                'claimed_by'    =>          null,
                'created_at'    =>          now(),
                'updated_at'    =>          now(),
            ],
            [
                'image'         =>          '9.jpg',
                'report_id'     =>          4,
                'claim'         =>          0,
                'claimed_by'    =>          null,
                'created_at'    =>          now(),
                'updated_at'    =>          now(),
            ],
            [
                'image'         =>          '11.jpg',
                'report_id'     =>          4,
                'claim'         =>          0,
                'claimed_by'    =>          null,
                'created_at'    =>          now(),
                'updated_at'    =>          now(),
            ],
            [
                'image'         =>          '7.webp',
                'report_id'     =>          5,
                'claim'         =>          0,
                'claimed_by'    =>          null,
                'created_at'    =>          now(),
                'updated_at'    =>          now(),
            ],
            [
                'image'         =>          '12.webp',
                'report_id'     =>          5,
                'claim'         =>          0,
                'claimed_by'    =>          null,
                'created_at'    =>          now(),
                'updated_at'    =>          now(),
            ],
            [
                'image'         =>          '14.jpg',
                'report_id'     =>          6,
                'claim'         =>          0,
                'claimed_by'    =>          null,
                'created_at'    =>          now(),
                'updated_at'    =>          now(),
            ],
            [
                'image'         =>          '13.jpg',
                'report_id'     =>          7,
                'claim'         =>          0,
                'claimed_by'    =>          null,
                'created_at'    =>          now(),
                'updated_at'    =>          now(),
            ],
            [
                'image'         =>          '2.webp',
                'report_id'     =>          8,
                'claim'         =>          0,
                'claimed_by'    =>          null,
                'created_at'    =>          now(),
                'updated_at'    =>          now(),
            ],
            [
                'image'         =>          '15.jpg',
                'report_id'     =>          8,
                'claim'         =>          0,
                'claimed_by'    =>          null,
                'created_at'    =>          now(),
                'updated_at'    =>          now(),
            ],
            [
                'image'         =>          '10.webp',
                'report_id'     =>          9,
                'claim'         =>          0,
                'claimed_by'    =>          null,
                'created_at'    =>          now(),
                'updated_at'    =>          now(),
            ],
            [
                'image'         =>          '3.jpg',
                'report_id'     =>          10,
                'claim'         =>          0,
                'claimed_by'    =>          null,
                'created_at'    =>          now(),
                'updated_at'    =>          now(),
            ]
        ],[],[]);
    }
}

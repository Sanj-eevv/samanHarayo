<?php

namespace Database\Seeders;

use App\Models\category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        category::upsert([
            [
                'name'              =>          'electronics',
                'created_at'        =>          now(),
            ],
            [
                'name'              =>          'jewellery',
                'created_at'        =>           now(),
            ],
            [
                'name'              =>          'documents',
                'created_at'        =>           now(),
            ],
            [
                'name'              =>          'others',
                'created_at'        =>           now(),
            ],
        ],['name'],['name']);
    }
}

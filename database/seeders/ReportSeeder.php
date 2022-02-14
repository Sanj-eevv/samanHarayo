<?php

namespace Database\Seeders;

use App\Models\Report;
use Illuminate\Database\Seeder;

class ReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Report::upsert([
            [
                'name'                  =>            'samsung mobile',
                'description'           =>            'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci aut deserunt fugiat hic perferendis perspiciatis? Eveniet, illum iure laboriosam magni modi molestiae molestias odit quaerat quia quod, rerum sint sunt!',
                'category_id'           =>            1,
                'brand'                 =>            'Samsung',
                'status'                =>            'verified',
                'report_type'           =>            'found',
                'contact_number'        =>            '9812380822',
                'contact_email'         =>            'sanjeevvsanjeevv1@gmail.com',
                'created_at'            =>             Now(),
                'updated_at'            =>             Now(),
            ],
            [
                'name'                  =>            'Laptop n90',
                'description'           =>            'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci aut deserunt fugiat hic perferendis perspiciatis? Eveniet, illum iure laboriosam magni modi molestiae molestias odit quaerat quia quod, rerum sint sunt!',
                'category_id'           =>            1,
                'brand'                 =>            'Lenovo',
                'status'                =>            'pending',
                'report_type'           =>            'found',
                'contact_number'        =>            '9842030041',
                'contact_email'         =>            'sanjeevvsanjeev11@gmail.com',
                'created_at'            =>             Now(),
                'updated_at'            =>             Now(),
            ],
            [
                'name'                  =>            'Atm Card',
                'description'           =>            'I found a atm card at itahari',
                'category_id'           =>            4,
                'brand'                 =>            null,
                'status'                =>            'pending',
                'report_type'           =>            'found',
                'contact_number'        =>            '9812312389',
                'contact_email'         =>            'sanjeevvsanjeev111@gmail.com',
                'created_at'            =>             Now(),
                'updated_at'            =>             Now(),
            ],
            [
                'name'                  =>            'Gold ring',
                'description'           =>            'I found a gold ring at itahari',
                'category_id'           =>            2,
                'brand'                 =>            null,
                'status'                =>            'verified',
                'report_type'           =>            'found',
                'contact_number'        =>            '9812380822',
                'contact_email'         =>            'sanjeevvsanjeev1@gmail.com',
                'created_at'            =>             Now(),
                'updated_at'            =>             Now(),
            ],
            [
                'name'                  =>            'Laptop n3040',
                'description'           =>            'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci aut deserunt fugiat hic perferendis perspiciatis? Eveniet, illum iure laboriosam magni modi molestiae molestias odit quaerat quia quod, rerum sint sunt!',
                'category_id'           =>            1,
                'brand'                 =>            'Apple',
                'status'                =>            'verified',
                'report_type'           =>            'lost',
                'contact_number'        =>            '9812380822',
                'contact_email'         =>            'sanjeevvsanjeev11121@gmail.com',
                'created_at'            =>             Now(),
                'updated_at'            =>             Now(),
            ],
            [
                'name'                  =>            'Mobile ultra',
                'description'           =>            'I Lost my new mobile at itahari',
                'category_id'           =>            1,
                'brand'                 =>            'Xiaomi',
                'status'                =>            'verified',
                'report_type'           =>            'lost',
                'contact_number'        =>            '9812380822',
                'contact_email'         =>            'sanjeevvsasnjeev11121@gmail.com',
                'created_at'            =>             Now(),
                'updated_at'            =>             Now(),
            ],
        ],['contact_number','contact_email'],['updated_at']);
    }
}

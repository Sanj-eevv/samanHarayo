<?php

namespace Database\Seeders;

use App\Models\Payment;
use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Payment::upsert([
            [
                'total'                 =>              1012.00,
                'transaction_id'        =>              'pi_3KNgtsDb5yVTJO3Q1sGafR5v',
                'report_id'             =>              5,
                'created_at'            =>              now(),
                'updated_at'            =>              now(),
            ],
            [
                'total'                 =>              1012.00,
                'transaction_id'        =>              'pi_3KNgytDb5yVTJO3Q1sDxKabD',
                'report_id'             =>              6,
                'created_at'            =>              now(),
                'updated_at'            =>              now(),
            ],
        ],['transaction_id'],['updated_at', 'total']);
    }
}

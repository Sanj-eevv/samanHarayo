<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::upsert([
            [
                'name' => 'superAdmin',
                'label' => 'Super Admin',
                'description' => 'Super Admin can manage anything',
                'preserved' => 'yes',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'admin',
                'label' => 'Admin',
                'preserved' => 'yes',
                'description' => 'Owner and could manage all data related to the website contents',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'basicUser',
                'label' => 'Basic User',
                'preserved' => 'yes',
                'description' => 'User level authorization can basic tasks',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ], ['name'], ['label','description','updated_at']);
    }
}

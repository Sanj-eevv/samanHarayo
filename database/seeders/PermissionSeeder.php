<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::upsert([
            /**
             * User Model Related Permissions 1-4
             */
            [
                'name' => 'user-view',
                'label' => 'User View',
                'description' => 'Allows to view users',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'user-create',
                'label' => 'User Create',
                'description' => 'Allows to create user',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'user-update',
                'label' => 'User Update',
                'description' => 'Allows to update user',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'user-destroy',
                'label' => 'User Destroy',
                'description' => 'Allows to destroy user',
                'created_at' => now(),
                'updated_at' => now()
            ],
            ],['name'],['label','description','updated_at']);
    }
}

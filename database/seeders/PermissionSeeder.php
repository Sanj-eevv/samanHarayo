<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
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
            /**
             * Report Model Related Permissions 5-8
             */
            [
                'name' => 'report-view',
                'label' => 'Report View',
                'description' => 'Allows to view report',
                'created_at' => now(),
                'updated_at' => now()
            ],
//            [
//                'name' => 'report-create',
//                'label' => 'Report Create',
//                'description' => 'Allows to create report',
//                'created_at' => now(),
//                'updated_at' => now()
//            ],
            [
                'name' => 'report-update',
                'label' => 'Report Update',
                'description' => 'Allows to update report',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'report-destroy',
                'label' => 'Report Destroy',
                'description' => 'Allows to destroy report',
                'created_at' => now(),
                'updated_at' => now()
            ],
            /**
             * Contact Model Related Permissions 9-12
             */
            [
                'name' => 'contact-view',
                'label' => 'Contact View',
                'description' => 'Allows to view contact',
                'created_at' => now(),
                'updated_at' => now()
            ],
//            [
//                'name' => 'contact-create',
//                'label' => 'Contact Create',
//                'description' => 'Allows to create contact',
//                'created_at' => now(),
//                'updated_at' => now()
//            ],
//            [
//                'name' => 'contact-update',
//                'label' => 'Contact Update',
//                'description' => 'Allows to update contact',
//                'created_at' => now(),
//                'updated_at' => now()
//            ],
            [
                'name' => 'contact-destroy',
                'label' => 'Contact Destroy',
                'description' => 'Allows to destroy contact',
                'created_at' => now(),
                'updated_at' => now()
            ],
            /**
             * FAQ Model Related Permissions 1-4
             */
            [
                'name' => 'faq-view',
                'label' => 'Faq View',
                'description' => 'Allows to view faq',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'faq-create',
                'label' => 'Faq Create',
                'description' => 'Allows to create faq',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'faq-update',
                'label' => 'Faq Update',
                'description' => 'Allows to update faq',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'faq-destroy',
                'label' => 'Faq Destroy',
                'description' => 'Allows to destroy faq',
                'created_at' => now(),
                'updated_at' => now()
            ],
            ],['name'],['label','description','updated_at']);
        $permissions = Permission::all();
        $permissions->each(function ($permission){$permission->roles()->sync([1]);
        });

    }
}

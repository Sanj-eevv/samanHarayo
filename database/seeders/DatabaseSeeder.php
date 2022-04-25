<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            PermissionSeeder::class,
            CategorySeeder::class,
            SettingSeeder::class,
            ReportSeeder::class,
            RewardSeeder::class,
            ContactSeeder::class,
            FaqSeeder::class,
            ItemImageSeeder::class,
            FeatureSeeder::class,
        ]);
    }
}

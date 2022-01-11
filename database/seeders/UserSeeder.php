<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::where('name','superAdmin')->first();
        User::upsert([
            [
                'first_name'                => 'Sanjeev',
                'last_name'                 => 'Bhandari',
                'email'                     => 'sanjeevvsanjeev1@gmail.com',
                'email_verified_at'         => now(),
                'avatar'                    => null,
                'password'                  => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'role_id'                   => $role->id,
                'remember_token'            => Str::random(10),
            ],
            [
                'first_name'                => 'Sanjeev',
                'last_name'                 => 'Bhandari',
                'email'                     => 'sanjeevvsanjeev11@gmail.com',
                'email_verified_at'         => now(),
                'avatar'                    => null,
                'password'                  => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'role_id'                   => 3,
                'remember_token'            => Str::random(10),
            ],
            ],['email'],[]);
       User::factory(20)->create();
    }
}

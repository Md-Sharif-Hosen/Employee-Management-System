<?php

namespace Database\Seeders;

use App\Models\UserRole;
use Illuminate\Database\Seeder;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        UserRole::truncate();
        UserRole::create([
            'title' => 'Admin',
            'role' => 1

        ]);
        UserRole::create([
            'title' => 'User',
            'role' => 2

        ]);
    }
}

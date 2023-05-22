<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::truncate();
        User::create([
            'username'=>'Admin',
            'role_id'=>1,
            'phone_number'=>'01728737552',
            'email'=>'admin@gmail.com',
            'password'=>Hash::make('12345678')


        ]);
        User::create([
            'username'=>'User1',
            'role_id'=>2,
            'phone_number'=>'01721120462',
            'email'=>'sharifkhan762@gmail.com',
            'password'=>Hash::make('12345678')


        ]);
        User::factory()->count(20)->create();

    }
}

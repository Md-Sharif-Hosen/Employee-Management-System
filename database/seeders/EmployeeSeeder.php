<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Employee::truncate();
        Employee::create([
            'name' => 'MD.Tarikul Islam',
            'date_of_birth' => '1998-01-06',
            'gender'=>'Male',
            'email'=>'tarikul@gmail.com',
            'phone_number'=>'01728737552',
            'position'=>'manager',
            'salary'=>'50,0000'
        ]);
    }
}

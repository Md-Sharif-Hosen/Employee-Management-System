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
        Employee::create([
            'name' => 'MD.mukit rana',
            'date_of_birth' => '1998-01-06',
            'gender'=>'Male',
            'email'=>'mukit@gmail.com',
            'phone_number'=>'01728737552',
            'position'=>'Designer',
            'salary'=>'50,0000'
        ]);
        Employee::create([
            'name' => 'MD.Rayhan ',
            'date_of_birth' => '1998-01-06',
            'gender'=>'Male',
            'email'=>'Rayhan@gmail.com',
            'phone_number'=>'01728737552',
            'position'=>'Digital Marketer',
            'salary'=>'50,0000'
        ]);

        Employee::create([
            'name' => 'joton ',
            'date_of_birth' => '1998-01-06',
            'gender'=>'Male',
            'email'=>'joton@gmail.com',
            'phone_number'=>'01728737552',
            'position'=>'Web Devoloper',
            'salary'=>'50,0000'
        ]);
    }
}



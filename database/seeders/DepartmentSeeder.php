<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Department::truncate();
        Department::create([
            'title'=>'Human Resources (HR)',
        ]);
        Department::create([
            'title'=>'Information Technology (IT)',
        ]);
        Department::create([
            'title'=>'Finance and Accounting',
        ]);
        Department::create([
            'title'=>'Sales and Marketing',
        ]);
    }
}

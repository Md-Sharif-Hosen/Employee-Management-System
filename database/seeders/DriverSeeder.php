<?php

namespace Database\Seeders;

use App\Models\Driver;
use Illuminate\Database\Seeder;

class DriverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Driver::truncate();
        Driver::create([
            'name'=>'tarek',
            'age'=>'28',
        ]);
        Driver::create([
            'name'=>'Sharif',
            'age'=>'26',
        ]);
        Driver::create([
            'name'=>'Rana',
            'age'=>'30',
        ]);

    }
}

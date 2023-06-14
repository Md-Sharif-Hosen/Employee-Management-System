<?php

namespace Database\Seeders;

use App\Models\Bus;
use Illuminate\Database\Seeder;

class BusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Bus::truncate();
        Bus::create([
            'title'=>'Volvo Ac',
            'bus_model'=>'DHA-133-70',
            'bus_start_time'=>'12:00:00',
            'bus_out_time'=>'18:00:00'


        ]);
        Bus::create([
            'title'=>'Volvo non Ac',
            'bus_model'=>'DHA-133-80',
            'bus_start_time'=>'13:00:00',
            'bus_out_time'=>'18:00:00'


        ]);
        Bus::create([
            'title'=>'Hanif Ac',
            'bus_model'=>'DHA-133-90',
            'bus_start_time'=>'08:00:00',
            'bus_out_time'=>'11:00:00',


        ]);

        Bus::create([
            'title'=>'Scania',
            'bus_model'=>'DHA-133-75',
            'bus_start_time'=>'06:00:00',
            'bus_out_time'=>'12:00:00',


        ]);
        Bus::create([
            'title'=>'Scania',
            'bus_model'=>'DHA-133-75',
            'bus_start_time'=>'06:00:00',
            'bus_out_time'=>'12:00:00',


        ]);
        Bus::create([
            'title'=>'Scania',
            'bus_model'=>'DHA-133-75',
            'bus_start_time'=>'06:00:00',
            'bus_out_time'=>'12:00:00',


        ]);
    }
}

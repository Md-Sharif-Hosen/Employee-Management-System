<?php

namespace Database\Seeders;

use App\Models\Attendance;
use Illuminate\Database\Seeder;

class AttendenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Attendance::truncate();
        Attendance::create([
            'date'=>'1998-01-06',
            'check_in_time'=>'10:00:00',
            'check_out_time'=>'15:00:00',
            'work_hours'=>8

        ]);
    }
}

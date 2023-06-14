<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\Driver;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BusController extends Controller
{
    //
    // public function create()
    // {
    //     //function_body
    //     $bus=Bus::get();
    //     dd($bus->toArray());
    //     return view('bus.create',$bus);
    // }

    // public function store()
    // {
    //     //function_body

    //     $bus_data=new Bus();
    //     dd($bus_data);
    //     $bus_data->title='Hanif';
    //     $bus_data->bus_model='shamoly';
    //     $bus_data->driver_id=1;
    //     $bus_data->save();
    // }

    public function view()
    {
        //function_body



        $bus_data=Bus::with('driver_info')->get();



        return view('bus.view',compact('bus_data'));
        // $bus_data=Bus::with('driver_info')->get();
        // dd($bus_data->toArray());
    }

    public function all()
    {
        //function_body


        $driver=Driver::with('bus_info')->get();

        dd($driver->toArray());
    }

    public function search()
    {
        //function_body
        // $bus_in=request('bus_in');
        // $bus_out=request('bus_out');
        $bus_in=request('bus_in');
        // $bus_data=Bus::with('driver_info')
        // ->where('bus_start_time',$bus_in)
        // ->where('bus_out_time',$bus_out)
        // ->get();
        $bus_data=Bus::with('driver_info')
        ->whereTime('bus_start_time','<',[$bus_in])
        ->whereTime('bus_out_time','>',[$bus_in])
        ->get();
        return view('bus.search',compact('bus_data'));


    }
    // public function edit($id)
    // {
    //     //function_body
    //     $bus_data=Bus::with('driver_info')->get();
    //     return view('bus.edit');
    // }
    // public function update($id)
    // {
    //     //function_body
    //     $bus_data=Bus::find($id);
    //     $bus_data->title='Hanif';
    //     $bus_data->bus_model='dipjol';
    //     $bus_data->driver_id=4;
    //     $bus_data->save();
    // }

    // public function delete($id)
    // {
    //     //function_body
    //     $bus_data=Bus::where('id',$id)->delete();
    // }
}

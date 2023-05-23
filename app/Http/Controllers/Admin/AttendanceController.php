<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Department;
use App\Models\Employee;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    //
    public function add()
    {
        //function_body
        $department = Department::get();
        $employee = Employee::get();
        return view('Admin.Employee_Attendance.add', compact('department', 'employee'));
    }

    public function store(request $request)
    {
        //function_body
        $attendance = new Attendance();
        $attendance->employee_name = request('employee_name');
        $attendance->department = request('department');
        $attendance->post = request('post');
        $attendance->date = request('date');
        $attendance->check_in_time = request('check_in_time');
        $attendance->check_out_time = request('check_out_time');
        $attendance->work_hours = request('work_hours');
        $attendance->save();
        return redirect()->route('admin.attendance.add');
    }
    public function view()
    {
        //function_body

        $attendance_data = Attendance::get();
        return view('Admin.Employee_Attendance.view',compact('attendance_data'));
    }

    public function edit($id)
    {
        //function_body
        $department = Department::get();
        $employee = Employee::get();
        $attend_view=Attendance::get()->find($id);
        return view('Admin.Employee_Attendance.edit',compact('attend_view','department','employee'));
    }
    public function update()
    {
        //function_body
      $attend_update= Attendance::find(request()->id);
      $attend_update->employee_name = request('employee_name');
      $attend_update->department = request('department');
      $attend_update->post = request('post');
      $attend_update->date = request('date');
      $attend_update->check_in_time = request('check_in_time');
      $attend_update->check_out_time = request('check_out_time');
      $attend_update->work_hours = request('work_hours');
      $attend_update->save();

      return redirect()->route('admin.employee.view');

    }
    public function delete($id)
    {
        //function_body
     Attendance::where('id',$id)->delete();
     return redirect()->route('admin.attendance.view');
    }
}

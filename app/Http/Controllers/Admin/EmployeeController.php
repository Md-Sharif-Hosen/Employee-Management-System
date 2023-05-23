<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Employee;
use App\Models\UserRole;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function add()
    {
        //function_body
        $department = Department::get();
        $role = UserRole::get();
        return view('Admin.Employee.add', compact('department', 'role'));
    }

    public function store(request $request)
    {
        //function_body
        $record = new Employee();
        $record->name = request('name');
        $record->roles_name = request('roles_name');
        $record->date_of_birth = request('date_of_birth');
        $record->gender = request('gender');
        $record->email = request('email');
        $record->phone_number = request('phone_number');
        $record->department_name = request('department_name');
        $record->position = request('position');
        $record->salary = request('salary');
        $record->save();

        return redirect()->route('admin.employee.view');
    }

    public function view()
    {
        //function_body
        // $all_data = Employee::with([
        //     'department_relation' => function ($q) {
        //         return $q->select('department_relation.id', 'department_relation.title');
        //     }
        // ])->get();



        $all_data = Employee::get();
        return view('Admin.Employee.view', compact('all_data'));
    }

    public function edit($id)
    {
        //function_body
        $department = Department::get();
        $role = UserRole::get();
        $all_data = Employee::get()->find($id);
        return view('Admin.Employee.edit', compact('department', 'role', 'all_data'));
    }

    public function update()
    {
        //function_body
        $record = Employee::find(request()->id);
        $record->name = request('name');
        $record->roles_name = request('roles_name');
        $record->date_of_birth = request('date_of_birth');
        $record->gender = request('gender');
        $record->email = request('email');
        $record->phone_number = request('phone_number');
        $record->department_name = request('department_name');
        $record->position = request('position');
        $record->salary = request('salary');
        $record->save();
        return redirect()->route('admin.employee.view');
    }

    public function delete($id)
    {
        //function_body
        Employee::where('id', $id)->delete();
        return redirect()->route('admin.employee.view');
    }
}

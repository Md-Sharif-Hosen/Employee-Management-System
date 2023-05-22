@extends('Admin.layouts.dashboard')
@section('main_content')
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2>Employee list</h2>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Role</th>
                                    <th>Employee Name</th>
                                    <th>Email</th>
                                    <th>Gender</th>
                                    <th>Date of Birth</th>
                                    <th>Phone Number</th>
                                    <th>Department</th>
                                    <th>position</th>
                                    <th>Salary</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($all_data as $item)
                                    <tr>
                                        <td>
                                            @if ($item->user_role)
                                            {{ $item->user_role->title }}

                                            @endif
                                        </td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->gender }}</td>
                                        <td>{{ $item->date_of_birth }}</td>
                                        <td>{{ $item->phone_number }}</td>
                                        <td>
                                            @if ($item->department_relation)
                                                {{$item->department_relation->title}}
                                            @endif
                                        </td>
                                        <td>{{ $item->position }}</td>
                                        <td>{{ $item->salary }}</td>
                                        <td>
                                            <a href="" class="btn btn-sm btn-info">Show</a>
                                            <a href="{{ route('admin.employee.edit',$item->id) }}" class="btn btn-sm btn-warning mx-2">Edit</a>
                                            <a href="{{ route('admin.employee.delete',$item->id ) }}" class="btn btn-sm btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

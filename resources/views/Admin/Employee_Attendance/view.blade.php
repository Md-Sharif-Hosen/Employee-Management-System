@extends('Admin.layouts.dashboard')
@section('main_content')
    <div class="row justify-content-center">
        <div class="col-12 ">
            <div class="card">
                <div class="card-header">
                    <h2>Employee Attendance</h2>
                </div>
                @if (session()->get('Success'))
                    {{-- <div class="alert alert-danger">
                    {{ session()->get('Success') }}

                </div> --}}
                    <script>
                        Swal.fire({
                            title: 'thanks!',
                            text: '{{ session()->get('Success') }} ',
                            icon: 'error',
                            confirmButtonText: 'Cool'
                        })
                    </script>
                @endif

                <div class="card-body">
                    <div class='table-responsive'>
                        <table class="table table-bordered ">
                            <thead>
                                <tr>
                                    <th>Employee Name</th>
                                    <th>Department</th>
                                    <th>Post</th>
                                    <th>Date</th>
                                    <th>Office In Time</th>
                                    <th>Office Out Time</th>
                                    <th>Work Time</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($attendance_data as $value)
                                    <tr>
                                        <td>
                                            @if ($value->Employee_name)
                                                {{ $value->Employee_name->name }}
                                            @endif
                                        </td>
                                        <td>
                                            @if ($value->department_name)
                                                {{ $value->department_name->title }}
                                            @endif
                                        </td>
                                        <td>
                                            @if ($value->post_name)
                                                {{ $value->post_name->position }}
                                            @endif
                                        </td>
                                        <td>{{ $value->date }}</td>
                                        <td>{{ $value->check_in_time }}</td>
                                        <td>{{ $value->check_out_time }}</td>
                                        <td>{{ $value->work_hours }}</td>
                                        <td>
                                            <a href="{{ route('admin.attendance.view') }}"
                                                class="btn btn-sm btn-info">View</a>
                                            <a href="{{ route('admin.attendance.edit', $value->id) }}"
                                                class="btn btn-sm btn-warning mx-2">Edit</a>
                                            <a href="{{ route('admin.attendance.delete', $value->id) }}"
                                                class="btn btn-sm btn-danger mx-2">Delete</a>
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

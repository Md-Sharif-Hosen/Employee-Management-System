@extends('Admin.layouts.dashboard')
@section('main_content')
    <div class="row justify-content-center">
        <div class="col-8 ">
            <form action="{{ route('admin.attendance.update') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card">

                    <div class="card-header">
                        <h2>Employee Attendance Edit</h2>
                    </div>
                    <div class="card-body">
                        <input type="hidden" name="id" value="{{ $attend_view->id }}">
                        <div class="form-group">
                            <label for="name">Please select Your Name: <span class="login-danger">*</span></label>
                            <select class="form-control" id='name' name="employee_name">
                                @foreach ($employee as $name)
                                    <option {{ $attend_view->employee_name == $name->id? 'selected': '' }} value="{{ $name->id }}">{{ $name->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="department">Department: <span class="login-danger">*</span></label>
                            <select class="form-control" id="department" name="department">
                                @foreach ($department as $value)
                                    <option {{ $attend_view->department ==$value->id? 'selected': '' }} value="{{ $value->id }}">{{ $value->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="post">Post:<span class="login-danger">*</span></label>
                            <select class="form-control" id="post" name="post">
                                @foreach ($employee as $value)
                                    <option {{ $attend_view->post == $value->id? 'selected': '' }} value="{{ $value->id }}">{{ $value->position }}</option>
                                @endforeach
                            </select>
                        </div>



                        <div class="form-group">
                            <label for="">Date:<span class="login-danger">*</span></label>
                            <input class="form-control" type="date" value="{{ $attend_view->date }}" name="date">
                        </div>

                        <div class="form-group">
                            <label for="">Office In Time:<span class="login-danger">*</span> <span><small>Office
                                        hours Start 9am </small> </span></label>
                            <input class="form-control" type="time" value="{{ $attend_view->check_in_time }}" name="check_in_time">
                        </div>
                        <div class="form-group">
                            <label for="">Office Out Time:<span class="login-danger">*</span> <span><small>Office
                                        hours End 6pm</small> </span></label>
                            <input class="form-control" type="time" value="{{ $attend_view->check_out_time }}" name="check_out_time" min="09:00" max="18:00">
                        </div>

                        <div class="form-group">
                            <label for="">Work Hours: <span class="login-danger">*</span></label>
                            <input class="form-control" type="text" value="{{ $attend_view->work_hours }}" name="work_hours">
                        </div>
                        <div class="text-center card-footer">
                            <button class="btn btn-outline-dark " type="submit">Update</button>
                        </div>

                    </div>
                </div>
            </form>


        </div>

    </div>
@endsection

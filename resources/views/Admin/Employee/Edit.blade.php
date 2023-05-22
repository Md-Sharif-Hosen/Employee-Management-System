@extends('Admin.layouts.dashboard')
@section('main_content')
    <div class="row justify-content-center">
        <div class="col-6">
            <form action="{{ route('admin.employee.update') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h2>Employee Add</h2>
                    </div>
                    <div class="card-body">
                        <input type="hidden" name="id" value="{{ $all_data->id }}">
                        <div class="form-group">
                            <label for="">Employee Name <span class="login-danger">*</span></label>
                            <input class="form-control" type="text" name="name" value="{{ $all_data->name }}">
                        </div>

                        <div class="form-group">
                            <label for="roles_name">Role Name</label>
                            <select class="form-control" name="roles_name" id="roles_name"  >
                                @foreach ($role as $item)
                                    <option {{ $all_data->roles_name == $item->id? 'selected' : ''}} value="{{ $item->id }}">
                                        {{ $item->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Email <span class="login-danger">*</span></label>
                            <input class="form-control" type="email" name="email" value="{{ $all_data->email }}">
                        </div>

                        <div class="form-group">
                            <label for="">Gender <span class="login-danger">*</span></label>
                            <label for="male">
                                <input type="radio" id="male" value="male" name="gender" value="{{ $all_data->gender }}">
                                Male
                            </label>
                            <label for="female">
                                <input type="radio" id="female" value="female" name="gender" value="{{ $all_data->gender }}">
                                Female
                            </label>
                            <label for="others">
                                <input type="radio" id="others" value="others" name="gender" value="{{ $all_data->gender }}">
                                Others
                            </label>
                        </div>

                        <div class="form-group">
                            <label for="">Date of Birth <span class="login-danger">*</span></label>
                            <input class="form-control" type="date" data-date-farmat="mm/dd/yyyy" name="date_of_birth" value="{{ $all_data->date_of_birth }}">

                        </div>

                        <div class="form-group">
                            <label for="">Phone Number</label>
                            <input class="form-control" type="tel" name="phone_number" value="{{ $all_data->phone_number }}">
                        </div>

                        <div class="form-group">
                            <label for="department_name">Department <span class="login-danger">*</span></label>
                            <select class="form-control" name="department_name" id="department_name" value="{{ $all_data->department_name }}">
                                @foreach ($department as $item)
                                    <option {{ $all_data->roles_name==$item->id? 'selected': " " }} value="{{ $item->id }}">
                                        {{ $item->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Position</label>
                            <input class="form-control" type="text" name="position" value="{{ $all_data->position }}">
                        </div>
                        <div class="form-group">
                            <label for="">Salary</label>
                            <input class="form-control" type="text" name="salary" value="{{ $all_data->salary }}">
                        </div>
                        <div class="text-center card-footer">
                            <button class="btn btn-outline-dark" type="submit">Update</button>

                        </div>





                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection

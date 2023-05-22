@extends('Admin.layouts.dashboard')
@section('main_content')
    <div class="row justify-content-center">
        <div class="col-6">
            <form action="{{ route('admin.employee.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h2>Employee Add</h2>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Employee Name <span class="login-danger">*</span></label>
                            <input class="form-control" type="text" name="name">
                        </div>

                        <div class="form-group">
                            <label for="roles_name">Role Name</label>
                            <select class="form-control" name="roles_name" id="roles_name">
                                @foreach ($role as $item)
                                    <option value="{{ $item->id }}">
                                        {{ $item->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Email <span class="login-danger">*</span></label>
                            <input class="form-control" type="email" name="email">
                        </div>

                        <div class="form-group">
                            <label for="">Gender <span class="login-danger">*</span></label>
                            <label for="male">
                                <input type="radio" id="male" value="male" name="gender">
                                Male
                            </label>
                            <label for="female">
                                <input type="radio" id="female" value="female" name="gender">
                                Female
                            </label>
                            <label for="others">
                                <input type="radio" id="others" value="others" name="gender">
                                Others
                            </label>
                        </div>

                        <div class="form-group">
                            <label for="">Date of Birth <span class="login-danger">*</span></label>
                            <input class="form-control" type="date" data-date-farmat="mm/dd/yyyy" name="date_of_birth">

                        </div>

                        <div class="form-group">
                            <label for="">Phone Number</label>
                            <input class="form-control" type="tel" name="phone_number">
                        </div>

                        <div class="form-group">
                            <label for="department_name">Department <span class="login-danger">*</span></label>
                            <select class="form-control" name="department_name" id="department_name">
                                @foreach ($department as $item)
                                    <option value="{{ $item->id }}">
                                        {{ $item->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Position</label>
                            <input class="form-control" type="text" name="position">
                        </div>
                        <div class="form-group">
                            <label for="">Salary</label>
                            <input class="form-control" type="text" name="salary">
                        </div>
                        <div class="text-center card-footer">
                            <button class="btn btn-outline-dark" type="submit">Submit</button>

                        </div>





                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection

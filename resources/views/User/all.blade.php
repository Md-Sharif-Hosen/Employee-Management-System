<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
    </script>
</head>

<body>
    {{-- <div class="container" >
        <form type="get" class="d-flex gap-lg-2 justify-content-center my-3" action="{{ route('user.all_user_search') }}">
            <div>
                <label for="">Form</label>
             <input type="date" name="form_date">
            </div>
            <div>
                <label for="">To</label>
                <input type="date" name="to_date">
            </div>
            <button type="submit">submit</button>
        </form>

    </div> --}}

    <div class="container justify-content-center">
        <div class="input-group justify-content-end">
            <form class="my-2" type="get" action="{{ route('user.search') }}">
                <div>
                    <label for="">Form</label>
                 <input type="date" class="form-control" name="form_date">
                </div>
                <div>
                    <label for="">To</label>
                    <input type="date" class="form-control" name="to_date">
                </div>
                <input type="search" placeholder="search" name="query" class=" form-control">
                <button class="btn btn-success" type="submit"> Search</button>
            </form>
        </div>
        @if (session()->get('Deleted'))
        <script>

            Toast.fire({
            icon: 'success',
            title: '{{session()->get('Deleted')}}'
            })
        </script>
        @endif
        <div class="col-12">
            <div class="table-responsibe">
                <h1 class="text-center">All User</h1>
                <div class="d-flex justify-content-between">

                    <div class="text-start my-2">
                        <a class="btn btn-outline-info"  href="{{ route('user.create') }}">Create</a>
                    </div>
                    <div class="text-end my-2" >
                      <a class="btn btn-outline-warning " href="{{ route('user.recycle_bin') }}"><span style="color: red">RecycleBin Data</span> </a>
                    </div>
                </div>
                <table class="table table-striped table-dark">
                    <thead>
                        <th>ID</th>
                        <th>name</th>
                        <th>User Role</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Photo</th>
                        {{-- <th>Password</th> --}}

                    </thead>
                    <tbody>
                        @foreach ($user_data_all as $data)
                            <tr>
                                <td>{{ $data->id }}</td>
                                <td>{{ $data->username }}</td>
                                <td>
                                    @if ($data->role)
                                        {{ $data->role->title }}
                                    @endif
                                </td>
                                <td>{{ $data->email }}</td>
                                {{-- @dd($data->photo) --}}
                                <td>{{ $data->status }}</td>
                                <td>
                                    <img src="{{ asset($data->photo) }}" height="100" width="100">
                                </td>
                                {{-- <td>{{ $data->password }}</td> --}}
                                <td>
                                    <a class="btn btn-info" href="{{ route('user.view', $data->id) }}">view</a>
                                    <a class="btn btn-outline-info" href="{{ route('user.edit',$data->id) }}">Edit</a>
                                    <a class="btn btn-danger" onclick="return confirm('Do you want to delete') "
                                        href="{{ route('user.delete', $data->id) }}">Delete</a>

                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>

</html>

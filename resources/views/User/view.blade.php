<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    <div class="container justify-content-center">
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <h1>User View</h1>
                </div>
                <div class="text-end">
                    <a href="{{ route('user.recycle_bin') }}" class="btn btn-outline-success"><span style="color: rgb(128, 58, 0)"> <-Back</span></a>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-dark">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Role</th>
                                <th>Photo</th>
                            </tr>
                        </thead>
                        <tbody>

                            {{-- @dd($data) --}}
                            <tr>
                                <td>{{$user_view->username}}</td>
                                <td>
                                    @if ($user_view->role)

                                    {{$user_view->role->title}}
                                    @endif
                                </td>
                                <td><img src="/{{$user_view->photo }}"alt="Image" width="100" height="100"></td>

                            </tr>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

</body>

</html>

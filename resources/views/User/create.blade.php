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
    <div class="container justify-content-center">
        <div class="col-6">
            <div class="card">
                <div class="card-header d-flex gap-2 justify-content-between">
                    <h1 class="text-center">User Create</h1>
                    <a href="{{ route('user.all') }}"> <span class="btn btn-outline-success">Back-></span></a>
                </div>
                <div class="card-body border-dark">
                    @if (session()->get('done'))
                        <script>
                            Toast.fire({
                                icon: 'done',
                                title: '{{ session()->get('done') }}'
                            })
                        </script>
                    @endif

                    <form action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-control">
                            <label for="">Name</label>
                            <input class="form-control" type="text" name="username">
                            @error('username')
                                <div class="alert alert-danger">
                                  {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-control">
                            <label for="">User Role</label>
                            <select class="form-control" name="role_id" id="">
                                <option value="">Select</option>
                                @foreach ($user as $item)
                                    <option value="{{ $item->id }}">
                                        @if ($item->role)
                                            {{ $item->role->title }}
                                        @else
                                        @endif

                                    </option>
                                @endforeach
                            </select>
                            @error('role_id')
                            <div class="alert alert-danger">
                              {{ $message }}
                            </div>
                        @enderror
                        </div>
                        <div class="form-control">
                            <label for="">Email</label>
                            <input type="email" class="form-control" name="email">
                            @error('email')
                            <div class="alert alert-danger">
                              {{ $message }}
                            </div>
                        @enderror
                        </div>
                        <div class="form-control">
                            <label for="">Photo</label>
                            <input class="form-control"type="file" accept="image/*" name="photo">
                            @error('photo')
                            <div class="alert alert-danger">
                              {{ $message }}
                            </div>
                        @enderror
                        </div>
                        <div class="form-control">
                            <label for="">Password</label>
                            <input class="form-control" type="text" name="password" id="">
                            @error('password')
                            <div class="alert alert-danger">
                              {{ $message }}
                            </div>
                        @enderror
                        </div>
                        <div class="text-center card-footer">
                            <button class="btn btn-outline-dark">Submit</button>

                        </div>


                    </form>
                    {{-- @php
dd(session()->all())
@endphp --}}
                </div>
            </div>
        </div>
    </div>

</body>

</html>

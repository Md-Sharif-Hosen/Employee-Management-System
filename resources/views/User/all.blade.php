@include('user.layout.header')

<!-- Modal -->
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



<div class="container justify-content-center col-lg-12 col-md-6 col-sm-3">
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
                title: '{{ session()->get('Deleted') }}'
            })
        </script>
    @endif
    <div class="col-12">
        <div class="table-responsibe">
            <h1 class="text-center">All User</h1>
            <div class="d-flex justify-content-between">

                <div class="text-start my-2">
                    <a class="btn btn-outline-info" href="{{ route('user.create') }}">Create</a>
                </div>
                <div class="text-end my-2">
                    <a class="btn btn-outline-warning " href="{{ route('user.recycle_bin') }}"><span
                            style="color: red">RecycleBin Data</span> </a>
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

                            <td>{{ $data->status }}</td>
                            <td>
                                <img src="{{ asset($data->photo) }}" height="100" width="100">
                            </td>

                            <td>
                                <a class="btn btn-info" href="{{ route('user.view', $data->id) }}">view</a>
                                <button type="button" class="btn btn-outline-info edit_btn"
                                    value="{{ $data->id }}">Edit</button>
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


<!--//edit data -->
@if (session()->get('done'))
<script>
    Toast.fire({
        icon: 'success',
        title: '{{ session()->get('done') }}'
    })
</script>
@else
<h2>Error</h2>
@endif
<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('user.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" id="id" name="id">
                <div class="modal-body">
                    <div class="form-control">
                        <label for="">Name</label>
                        <input class="form-control" value="" type="text" id="username" name="username">
                        @error('username')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-control">
                        <label for="">User Role</label>
                        <select class="form-control" value="" name="role_id" id="role_id">
                            <option value="">Select</option>
                            @foreach (App\Models\UserRole::get() as $item)
                                <option value="{{ $item->id }}">{{ $item->title }}</option>
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
                        <input type="email" class="form-control" id="email" name="email">
                        @error('email')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-control">
                        <label for="">Photo</label>
                        <input class="form-control" type="file" accept="image/*" id="photo" name="photo">
                        <img src="" id="photo_preview" height="50" width="50" alt="">
                        @error('photo')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>





<script src="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('/assets/jquery.js') }}"></script>
<script>
    $(document).ready(function() {
        $(document).on('click', '.edit_btn', function() {
            var user_id = $(this).val();
            // alert(user_id);
            $.ajax({
                type: "GET",
                url: "/user/edit/" + user_id,
                success: function(response) {
                    console.log(response);
                    console.log(response.user);
                    let user = response.user;
                    id.value = user.id;
                    username.value = user.username;
                    email.value = user.email;
                    role_id.value = user.role_id;
                    photo_preview.src = '/' + user.photo;
                    $('#editModal').modal('show');
                }
            });
        });
    });
</script>

@include('user.layout.footer')

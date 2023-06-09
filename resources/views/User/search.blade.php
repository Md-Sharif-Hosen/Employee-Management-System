@include('user.layout.header')

    <div class="container justify-content-center">
        <div class="d-flex gap-2 justify-content-between">

            <div class="btn justify-content-around" >
               <a href="{{ route('user.all') }}" class="btn btn-outline-info btn-success">Back</a>
            </div>
            <div class="input-group justify-content-end">
                <form class="my-2" type="get" action="{{ route('user.search') }}">
                    <input type="search" placeholder="search"  name="query" class=" form-control">
                    <button class="btn btn-success" type="submit"> Search</button>
                </form>
            </div>
        </div>
        <div class="col-12">

            <div class="table-responsibe">
                <h1 class="text-center">All User</h1>



                <table class="table table-striped table-dark">
                    <thead>
                        <th>ID</th>
                        <th>name</th>
                        <th>User Role</th>
                        <th>Email</th>
                        <th>Photo</th>
                        {{-- <th>Password</th> --}}

                    </thead>
                    <tbody>
                        @foreach ($user_data_all as $data )

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
                            <td>
                                <img src="/{{ $data->photo }}" height="100"  width="100">
                            </td>
                            {{-- <td>{{ $data->password }}</td> --}}
                            <td>
                                <a class="btn btn-info" href="{{ route('user.view',$data->id) }}">view</a>
                                <a class="btn btn-danger" onclick="return confirm('Do you want to delete') " href="{{ route('user.delete',$data->id) }}">Delete</a>

                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@include('user.layout.footer')

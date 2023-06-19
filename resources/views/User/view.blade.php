@include('user.layout.header')
    <div class="container justify-content-center">
        <div class="input-group justify-content-end">
            <form class="my-2" type="get" action="{{ route('user.search') }}">
                <input type="search" placeholder="search" name="query" class=" form-control">
                <button class="btn btn-success" type="submit"> Search</button>
            </form>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <h1>User View</h1>
                </div>
                <div class="text-end">
                    <a href="{{ route('user.all') }}" class="btn btn-outline-success"><span style="color: rgb(128, 58, 0)"> <-Back</span></a>
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

 
@include('user.layout.footer')

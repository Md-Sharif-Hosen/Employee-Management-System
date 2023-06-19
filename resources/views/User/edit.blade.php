@include('user.layout.header')
    <div class="container justify-content-center">
        <div class="col-6">
            <div class="card">
                <div class="card-header d-flex gap-2 justify-content-between">
                    <h1 class="text-center">User Edit</h1>
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

                    <form action="{{ route('user.update',['id'=>$user_edit->id]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-control">
                            <label for="">Name</label>
                            <input class="form-control" value="{{ $user_edit->username}}" type="text" name="username">
                            @error('username')
                                <div class="alert alert-danger">
                                  {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-control">
                            <label for="">User Role</label>
                            <select class="form-control" value="{{ $user_edit->role_id }}" name="role_id" id="role_id">
                                <option value="">Select</option>
                                @foreach ($role as $item)
                                    <option value="{{ $item->id }}" {{ $user_edit->role_id == $item->id ? 'selected' :''}}>{{ $item->title }}</option>
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
                            <input type="email" value="{{$user_edit->email }}" class="form-control" name="email">
                            @error('email')
                            <div class="alert alert-danger">
                              {{ $message }}
                            </div>
                        @enderror
                        </div>
                        <div class="form-control">
                            <label for="">Photo</label>
                            <input class="form-control"  type="file" accept="image/*" name="photo">
                             <img src="{{ asset($user_edit->photo) }}" height="50" width="50" alt="">
                            @error('photo')
                            <div class="alert alert-danger">
                              {{ $message }}
                            </div>
                        @enderror
                        </div>
                        <div class="form-control">
                            <label for="">Password</label>
                            <input class="form-control" type="text" value="{{ old('password') }}" name="password" >
                            @error('password')
                            <div class="alert alert-danger">
                              {{ $message }}
                            </div>
                        @enderror
                        </div>
                        <div class="text-center card-footer">
                            <button class="btn btn-outline-dark">Update</button>

                        </div>


                    </form>
                    {{-- @php
dd(session()->all())
@endphp --}}
                </div>
            </div>
        </div>
    </div>

@include('user.layout.footer')

@extends('app.layout')

@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit User</h4>
                    <form class="forms-sample" method="POST" action="{{route('user.update',['id' => $user->id])}}">
                        @include('message.message')
                        @csrf
                        <div class="form-group">
                            <label>Full name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                   name="name" placeholder="Enter full name" value="{{ old('name') ?? $user->name }}">
                            <span class="text-danger">@error('name'){{$message}}@enderror</span>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror"
                                   name="email" placeholder="Enter email address" value="{{ old('email') ?? $user->email }}">
                            <span class="text-danger">@error('email'){{$message}}@enderror</span>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                   name="password" placeholder="Enter password">
                            <span class="text-danger">@error('password'){{$message}}@enderror</span>
                        </div>
                        <button type="submit" class="btn btn-block btn-primary">Update</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


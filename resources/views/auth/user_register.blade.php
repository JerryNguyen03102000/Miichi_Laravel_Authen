<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Register</title>
</head>
<body>
<div class="container">
    <div class="row d-flex justify-content-center" style="margin-top:45px">
        <div class="col-md-4 col-md-offset-4 ">
            <h4>Register account user</h4>
            <hr>
            <form action="{{route('register.user.save')}}" method="post">
                @include('message.message')
                @csrf
                <div class="form-group">
                    <label>Full name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                           name="name" placeholder="Enter full name" value="{{ old('name') }}">
                    <span class="text-danger">@error('name'){{$message}}@enderror</span>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror"
                           name="email" placeholder="Enter email address" value="{{ old('email') }}">
                    <span class="text-danger">@error('email'){{$message}}@enderror</span>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                           name="password" placeholder="Enter password">
                    <span class="text-danger">@error('password'){{$message}}@enderror</span>
                </div>
                <button type="submit" class="btn btn-block btn-primary">Sign up</button>
                <br>
                <a href="{{route('login')}}">I already have an account,sign in</a>
            </form>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>

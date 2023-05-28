@extends('app.layout')
@section('content')
    <div class="col-lg-9 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="infor-user">
                    Name : {{$user->name}}
                </div>
                <hr>
                <div class="infor-user">
                    Email : {{$user->email}}
                </div>
                <hr>
                <div class="infor-user">
                    Created_at : {{$user->created_at}}
                </div>
                <hr>
                <div class="infor-user-btn">
                <a href="{{route('index')}}" class="btn btn-success">Back</a>
                </div>

            </div>
        </div>
    </div>

@endsection

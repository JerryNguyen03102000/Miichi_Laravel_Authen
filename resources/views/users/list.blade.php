@extends('app.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">List Users</h4>
                    @include('message.message')
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Created_at</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($users) > 0)
                                @foreach($users as $key => $value)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{$value->name}}</td>
                                    <td>{{$value->email}}</td>
                                    <td>{{$value->created_at}}</td>
                                    @if (Auth::guard('admin')->check() && Auth::guard('admin')->user()->role == 1)
                                        <td>
                                            <a href="{{route('user.detail', ['id' => $value->id])}}"><i class="fa-solid fa-eye text-success"></i></a>
                                            <a href="{{route('user.edit', ['id' => $value->id])}}"><i class="fa-solid fa-pen-to-square text-warning"></i></a>
                                            <a href="{{route('user.delete', ['id' => $value->id])}}" onclick="return confirm('do you want delete ?')"><i class="fa-solid fa-trash text-danger"></i></a>
                                        </td>
                                    @else
                                        <td>
                                            <a href="{{route('user.detail', ['id' => $value->id])}}"><i class="fa-solid fa-eye text-success"></i></a>
                                        </td>
                                    @endif
                                </tr>
                                @endforeach
                            @else
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@if(Session::has('success'))
    <div class="alert-success alert">
        {{Session::get('success')}}
    </div>
@endif
@if(Session::has('fail'))
    <div class="alert-danger alert">
        {{Session::get('fail')}}
    </div>
@endif


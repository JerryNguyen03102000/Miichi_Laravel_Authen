<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#user" aria-expanded="false"
               aria-controls="form-elements">
                <i class="fa-solid fa-bars menu-icon"></i>
                <span class="menu-title">Management Users</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="user">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="{{route('index')}}">List Users </a>
                    @if (Auth::guard('admin')->check() && Auth::guard('admin')->user()->role == 1)
                    <li class="nav-item"><a class="nav-link" href="{{route('user.create')}}">Create User </a>
                    </li>
                    @endif
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('logout')}}">
                <i class="fa-solid fa-right-from-bracket menu-icon"></i>
                <span class="menu-title">Logout</span>
            </a>
        </li>
    </ul>
</nav>


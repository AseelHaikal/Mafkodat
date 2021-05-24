<!-- Header -->
<div class="header">

    <!-- Logo -->
    <div class="header-left">
        <a href="{{route('dashboard')}}" class="logo">
            <img src="{{asset('assets/img/logo-small.png')}}" alt="Logo">
        </a>
        <a href="{{route('dashboard')}}" class="logo logo-small">
            <img src="{{asset('assets/img/logo-small.png')}}" alt="Logo" width="30" height="30">
        </a>
    </div>
    <!-- /Logo -->

    <a href="javascript:void(0);" id="toggle_btn">
        <i class="fe fe-text-align-left"></i>
    </a>

    <!-- Mobile Menu Toggle -->
    <a class="mobile_btn" id="mobile_btn">
        <i class="fa fa-bars"></i>
    </a>
    <!-- /Mobile Menu Toggle -->

    <!-- Header Right Menu -->
    <ul class="nav user-menu">
        <!-- User Menu -->
        <li class="nav-item dropdown has-arrow">
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                <span class="user-img">
                    @if(Auth::user()->profile_photo_path)
                    <img class="rounded-circle" src="{{asset(Auth::user()->profile_photo_path)}}" width="31" alt="user image"></span>
                    @else
                    <img class="rounded-circle" src="{{asset('assets/img/profiles/avatar-01.jpg')}}" width="31" alt="user image"></span>
                    @endif

            </a>
            <div class="dropdown-menu">
                <div class="user-header">
                    <div class="avatar avatar-sm">
                        @if(Auth::user()->profile_photo_path)
                            <img src="{{asset(Auth::user()->profile_photo_path)}}" alt="User Image" class="avatar-img rounded-circle">
                            @else
                            <img src="{{asset('assets/img/profiles/avatar-01.jpg')}}" alt="User Image" class="avatar-img rounded-circle">
                        @endif
                    </div>
                    <div class="user-text">
                        <h6>{{Auth::user()->name}}</h6>
                        <p class="text-muted mb-0">Administrator</p>
                    </div>
                </div>
                <a class="dropdown-item" href="{{route('user.profile',Auth::user()->id)}}">My Profile</a>
                <a class="dropdown-item" href="{{route('settings')}}">Settings</a>
                <a class="dropdown-item" href="{{route('logout')}}">Logout</a>
            </div>
        </li>
        <!-- /User Menu -->

    </ul>
    <!-- /Header Right Menu -->

</div>
<!-- /Header -->

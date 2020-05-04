<div class="header">
        <nav class="navbar top-navbar navbar-expand-md navbar-danger">
            <!-- Logo -->
            <div class="navbar-header">
                <a class="navbar-brand" href="{{route("dashboard")}}">
                    <!-- Logo icon -->
                    <b>
                    <img src="{{asset("train.png")}}" style="height: 50px;" alt="">
                    </b>
                </a>
            </div>
            <!-- End Logo -->
            <div class="navbar-collapse">
                <!-- toggle and nav items -->
                <ul class="navbar-nav mr-auto mt-md-0">
                    <!-- This is  -->
                    <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted  " href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                    <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted  " href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                    
                </ul>
                <!-- User profile and search -->
                <ul class="navbar-nav my-lg-0">
                    
                    <!-- End Messages -->
                    <!-- Profile -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        @if (Auth::user()->role->name == "ROLE_ADMIN")
                            ADMINISTRATOR
                        @else
                            PASSENGER
                        @endif | {{ Auth::user()->email }}
                            <i class="fa fa-user"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                            <ul class="dropdown-user">
                                <li>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fa fa-power-off"></i>
                                        Logout
                                    </a>
                                            
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
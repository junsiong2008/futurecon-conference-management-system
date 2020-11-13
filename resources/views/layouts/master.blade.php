<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.ico">
    <meta http-equiv=" X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        @yield('title')
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- CSS Files -->
    {{-- <link href="../assets/css/bootstrap.min.css" rel="stylesheet" /> --}}
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css')}}" />
    {{-- <link href="../assets/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" /> --}}
    <link rel="stylesheet" href="{{ asset('assets/css/now-ui-dashboard.css?v=1.5.0')}}" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    {{-- <link href="../assets/demo/demo.css" rel="stylesheet" /> --}}
    <link rel="stylesheet" href="{{ asset('assets/demo/demo.css')}}">


    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
</head>

<body class="">
    <div class="wrapper ">
        <div class="sidebar" data-color="red">

            <div class="logo">
                <a href="/home" class="simple-text logo-mini">
                    FC
                </a>
                <a href="/home" class="simple-text logo-normal">
                    FutureCon2020
                </a>
            </div>

            <div class="sidebar-wrapper" id="sidebar-wrapper">
                <ul class="nav">
                    <li class="{{'dashboard' == request()->path() ? 'active' : ''}}">
                        <a href="/dashboard">
                            <i class="now-ui-icons design_app"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>

                    <li class="{{'user' == request()->path() ? 'active' : ''}}">
                        <a href="/user">
                            <i class="now-ui-icons users_single-02"></i>
                            <p>Committee (Admin)</p>
                        </a>
                    </li>
                    <li class="{{'about' == request()->path() ? 'active' : ''}}">
                        <a href="/about">
                            <i class="now-ui-icons design_bullet-list-67"></i>
                            <p>About</p>
                        </a>
                    </li>
                    <li class="{{'attendance' == request()->path() ? 'active' : ''}}">
                        <a href="/attendance">
                            <i class="now-ui-icons design_bullet-list-67"></i>
                            <p>Attendance</p>
                        </a>
                    </li>
                    <li class="{{'faq' == request()->path() ? 'active' : ''}}">
                        <a href="/faq">
                            <i class="now-ui-icons design_bullet-list-67"></i>
                            <p>FAQs</p>
                        </a>
                    </li>
                    <li class="{{'participant' == request()->path() ? 'active' : ''}}">
                        <a href="/participant">
                            <i class="now-ui-icons users_single-02"></i>
                            <p>Participants</p>
                        </a>
                    </li>
                    <li class="{{'payment' == request()->path() ? 'active' : ''}}">
                        <a href="/payment">
                            <i class="now-ui-icons shopping_credit-card"></i>
                            <p>Payment</p>
                        </a>
                    </li>
                    <li class="{{'schedule' == request()->path() ? 'active' : ''}}">
                        <a href="/schedule">
                            <i class="now-ui-icons design_bullet-list-67"></i>
                            <p>Schedule</p>
                        </a>
                    </li>
                    <li class="{{'speaker' == request()->path() ? 'active' : ''}}">
                        <a href="/speaker">
                            <i class="now-ui-icons users_single-02"></i>
                            <p>Speaker</p>
                        </a>
                    </li>
                    <li class="{{'track' == request()->path() ? 'active' : ''}}">
                        <a href="/track">
                            <i class="now-ui-icons design_bullet-list-67"></i>
                            <p>Track</p>
                        </a>
                    </li>
                    <li class="{{'logActivity' == request()->path() ? 'active' : ''}}">
                        <a href="/logActivity">
                            <i class="now-ui-icons media-2_sound-wave"></i>
                            <p>Activity Log</p>
                        </a>
                    </li>
                    <li class="{{'telescope' == request()->path() ? 'active' : ''}}">
                        <a href="/telescope">
                            <i class="now-ui-icons objects_spaceship"></i>
                            <p>Laravel Telescope</p>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
        <div class="main-panel" id="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <div class="navbar-toggle">
                            <button type="button" class="navbar-toggler">
                                <span class="navbar-toggler-bar bar1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </button>
                        </div>

                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
                        aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <form>

                        </form>
                        <ul class="navbar-nav">

                            <li class="nav-item dropdown">

                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="now-ui-icons users_single-02"></i>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            {{-- <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="now-ui-icons location_world"></i>
                                    <p>
                                        <span class="d-lg-none d-md-block">Some Actions</span>
                                    </p>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </li> --}}

                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
            <div class="panel-header panel-header-sm">
            </div>
            <div class="content">
                @yield('content')
            </div>
            <footer class="footer">
                <div class=" container-fluid ">
                    <div class="copyright" id="copyright">
                        &copy; <script>
                            document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
                        </script>, CSEB574
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <!--   Core JS Files   -->
    {{-- <script src="../assets/js/core/jquery.min.js"></script> --}}
    <script src="{{ asset('assets/js/core/jquery.min.js')}}"></script>
    {{-- <script src="../assets/js/core/popper.min.js"></script> --}}
    <script src="{{ asset('assets/js/core/popper.min.js')}}"></script>
    {{-- <script src="../assets/js/core/bootstrap.min.js"></script> --}}
    <script src="{{ asset('assets/js/core/bootstrap.min.js')}}"></script>
    {{-- <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script> --}}
    <script src="{{ asset('assets/js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>

    <!-- Chart JS -->
    {{-- <script src="../assets/js/plugins/chartjs.min.js"></script> --}}
    <script src="{{ asset('assets/js/plugins/chartjs.min.js')}}"></script>
    <!--  Notifications Plugin    -->
    {{-- <script src="../assets/js/plugins/bootstrap-notify.js"></script> --}}
    <script src="{{ asset('assets/js/plugins/bootstrap-notify.js')}}"></script>
    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    {{-- <script src="../assets/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script> --}}
    <script src="{{ asset('assets/js/now-ui-dashboard.min.js?v=1.5.0')}}" type="text/javascript"></script>
    <!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
    {{-- <script src=" ../assets/demo/demo.js"> </script> --}}
    @yield('scripts')
    <script src="{{ asset('assets/demo/demo.js')}}"></script>

    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>


</body>

</html>
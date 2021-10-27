
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Title Page-->
    <title>Myweb</title>

    <!-- Fontfaces CSS-->
    <link href="{{ url('cool/css/font-face.css')}}" rel="stylesheet" media="all">
    <link href="{{ url('cool/vendor/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">
    <link href="{{ url('cool/vendor/font-awesome-5/css/fontawesome-all.min.css')}}" rel="stylesheet" media="all">
    <link href="{{ url('cool/vendor/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{ url('cool/vendor/bootstrap-4.1/bootstrap.min.css')}}" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="{{ url('cool/vendor/animsition/animsition.min.css')}}" rel="stylesheet" media="all">
    <link href="{{ url('cool/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet" media="all">
    <link href="{{ url('cool/vendor/wow/animate.css')}}" rel="stylesheet" media="all">
    <link href="{{ url('cool/vendor/css-hamburgers/hamburgers.min.css')}}" rel="stylesheet" media="all">
    <link href="{{ url('cool/vendor/slick/slick.css')}}" rel="stylesheet" media="all">
    <link href="{{ url('cool/vendor/select2/select2.min.css')}}" rel="stylesheet" media="all">
    <link href="{{ url('cool/vendor/perfect-scrollbar/perfect-scrollbar.css')}}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{ url('cool/css/theme.css')}}" rel="stylesheet" media="all">

    <link rel="stylesheet" href="{{ url('datatables-bs4/css/dataTables.bootstrap4.css') }}">





</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.html">
                            <img src="{{ url('cool/images/icon/logo.png')}}" alt="CoolAdmin" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="has-sub">
                            <a href="{{ url('/home')}}">
                                <i class="fas fa-tachometer-alt"></i>Home</a>
                        </li>
                        <li>
                            <a href="{{ url('/product')}}">
                                <i class="fas fa-chart-bar"></i>Product
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/transaction')}}">


                                <i class="fas fa-table"></i>Transaction</a>
                        </li>
                        <li>
                            <a href="{{ url('/tampiltrans') }}">
                                <i class="fas fa-table"></i>TransRecord</a>


                        </li>
                        <a href="{{ url('/tampildet') }}">
                            <i class="fas fa-calendar-alt"></i>DetailRecord</a>

                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="{{ url('cool/images/icon/logo.png')}}" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li>
                            <a href="{{ url('/home')}}">
                                <i class="fas fa-home"></i>Home</a>
                        </li>
                        <li>
                            <a href="{{ url('/product')}}">
                                <i class="fas fa-chart-bar"></i>Product</a>
                        </li>
                        
                        <li>
                            <a href="{{ url('/transaction')}}">

                                <i class="fas fa-table"></i>transaksi</a>
                        </li>
                         <li>
                            <a href="{{ url('/tampiltrans') }}">
                                <i class="fas fa-calendar-alt"></i>TransRecord</a>

                        </li>
                        <li>
                            <a href="{{ url('/tampildet') }}">
                                <i class="fas fa-calendar-alt"></i>DetailRecord</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                                <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." />
                                <button class="au-btn--submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </form>
                            <div class="header-button">
                                <div class="noti-wrap">
                                    <!-- <div class="noti__item js-item-menu">
                                        <div id="theme">
                                            <div onclick="setDarkMode(true)" id="darkBtn" class="">
                                                <span>Dark</span>
                                            </div>
                                            <div onclick="setDarkMode(false)" id="lightBtn" class="is-hidden">
                                                <span>Light</span>
                                            </div>
                                        </div>
                                    </div> -->
                                    <!-- <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-email"></i>
                                        <span class="quantity">1</span>
                                        <div class="email-dropdown js-dropdown">

                                        </div>
                                    </div>
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-notifications"></i>
                                        <span class="quantity">3</span>
                                        <div class="notifi-dropdown js-dropdown">
                                            <div class="notifi__title">
                                                <p>You have 3 Notifications</p>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c1 img-cir img-40">
                                                    <i class="zmdi zmdi-email-open"></i>
                                                </div>
                                                <div class="content">
                                                    <p>You got a email notification</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c2 img-cir img-40">
                                                    <i class="zmdi zmdi-account-box"></i>
                                                </div>
                                                <div class="content">
                                                    <p>Your account has been blocked</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c3 img-cir img-40">
                                                    <i class="zmdi zmdi-file-text"></i>
                                                </div>
                                                <div class="content">
                                                    <p>You got a new file</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__footer">
                                                <a href="#">All notifications</a>
                                            </div>
                                        </div>
                                    </div> -->
                                    
                                </div>
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="{{ url('cool/images/icon/avatar-01.jpg')}}" alt="John Doe" />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#">{{ auth::user()->name }}</a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="{{ url('cool/images/icon/avatar-01.jpg')}}" alt="John Doe" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#">{{ auth::user()->name }}</a>
                                                    </h5>
                                                    <span class="email">{{ auth::user()->email }}</span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="{{ url('/user')}}">
                                                        <i class="zmdi zmdi-account"></i>Account</a>
                                                </div>
                            
                                            </div>
                                            <div class="account-dropdown__footer">
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                                    <i class="zmdi zmdi-power"></i>{{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                            </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->
            <!-- MAIN CONTENT-->
            <div class="main-content">
            @yield('content')
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>
</div>
    <footer class="main-footer">
        <!-- To the right -->
        <!-- Default to the left -->
        <P class="text-right">Copyright &copy; 2014-2019   Bunayya Wahyu FA.</p>
    </footer>
    <!-- Jquery JS-->
    <script src="{{ url('jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap JS-->
    <script src="{{ url('cool/vendor/bootstrap-4.1/popper.min.js')}}"></script>
    <script src="{{ url('cool/vendor/bootstrap-4.1/bootstrap.min.js')}}"></script>
    <!-- Vendor JS       -->
    <script src="{{ url('cool/vendor/slick/slick.min.js')}}">
    </script>
    <script src="{{ url('cool/vendor/wow/wow.min.js')}}"></script>
    <script src="{{ url('cool/vendor/animsition/animsition.min.js')}}"></script>
    <script src="{{ url('cool/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js')}}">
    </script>
    <script src="{{ url('cool/vendor/counter-up/jquery.waypoints.min.js')}}"></script>
    <script src="{{ url('cool/vendor/counter-up/jquery.counterup.min.js')}}">
    </script>
    <script src="{{ url('cool/vendor/circle-progress/circle-progress.min.js')}}"></script>
    <script src="{{ url('cool/vendor/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
    <script src="{{ url('cool/vendor/chartjs/Chart.bundle.min.js')}}"></script>
    <script src="{{ url('cool/vendor/select2/select2.min.js')}}">
    </script>
    {{-- datatable --}}
    <script src="{{ url('datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ url('datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>


    <!-- Main JS-->
    <script src="{{ url('cool/js/main.js')}}"></script>

    {{-- sweet-alert --}}
    @include('sweetalert::alert')
    @yield('script.js')
    @yield('script1.js')
    
</body>

</html>
<!-- end document-->

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">

    <!-- Title Page-->
    <title>@yield('page-tittle') : Lucky Aice</title>

    <!-- Fontfaces CSS-->
    <link href="../css/font-face.css" rel="stylesheet" media="all">
    <link href="../vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="../vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="../vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="../vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="../vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="../vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="../vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="../vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="../vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="../vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="../vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- datetimepicker -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <!-- Data table -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.18/b-1.5.4/b-html5-1.5.4/b-print-1.5.4/datatables.min.css"/>

    <!-- Main CSS-->
    <link href="../css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">

    <!-- Modal -->
    <div class="modal fade" id="modal_main" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">@yield('modal_title')</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            @yield('modal_body')
          </div>
        </div>
      </div>
    </div>

    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="#">
                            <img src="" alt="Lucky Aice" />
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
                        <li class="has-sub my-nav @yield('nav-dashboard')">
                            <a class="js-arrow" href="{{ route('dashboard.index') }}">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li class="my-nav @yield('nav-game')">
                            <a href="#">
                                <i class="fas fa-chart-bar"></i>Game</a>
                                <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                    <li class="my-nav @yield('nav-lap-outlet')">
                                        <a href="{{route('laporan.outlet')}}">Laporan Outlet</a>
                                    </li>
                                </ul>
                        </li>
                        <li class="my-nav @yield('nav-produk')">
                            <a href="{{route('produk.index')}}">
                                <i class="fas fa-table"></i>Produk</a>
                        </li>
                        <li class="my-nav @yield('nav-user-andro')">
                            <a href="#">
                                <i class="far fa-check-square"></i>User</a>
                                <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                    <li class="my-nav @yield('nav-user-andro')">
                                        <a href="{{route('android.index')}}">Android</a>
                                    </li>
                                    <!--
                                    <li class="my-nav">
                                        <a href="#">Web</a>
                                    </li>
                                    -->
                                </ul>
                        </li>
                        <li class="my-nav @yield('nav-banner')">
                            <a class="js-arrow" href="{{ route('banner.index') }}">
                                <i class="fas fa-delicious"></i>Banner</a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fas fa-map-marker-alt"></i>Outlet</a>
                                <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                    <li class="my-nav @yield('nav-outlet')">
                                        <a href="{{route('outlets.index')}}">List</a>
                                    </li>
                                    <li class="my-nav @yield('nav-prize')">
                                        <a href="{{ route('app.prize') }}">Setting Hadiah</a>
                                    </li>
                                </ul>
                        </li>
                        <li class="my-nav">
                            <a href="{{ route('logout') }}">
                                <i class="fas fa-power-off"></i>Logout</a>
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
                    <img src="" alt="Lucky Aice" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="has-sub my-nav @yield('nav-dashboard')">
                            <a class="js-arrow" href="{{ route('dashboard.index') }}">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li class="my-nav @yield('nav-game')">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-chart-bar"></i>Game</a>
                                <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                    <li class="my-nav @yield('nav-lap-outlet')">
                                        <a href="{{route('laporan.outlet')}}">Laporan Outlet</a>
                                    </li>
                                </ul>
                        </li>
                        <li class="my-nav @yield('nav-produk')">
                            <a href="{{route('produk.index')}}">
                                <i class="fas fa-table"></i>Produk</a>
                        </li>
                        <li>
                            <a class="js-arrow" href="#">
                                <i class="far fa-check-square"></i>User</a>
                                <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                    <li class="my-nav @yield('nav-user-andro')">
                                        <a href="{{route('android.index')}}">Android</a>
                                    </li>
                                    <!--
                                    <li>
                                        <a href="#">Web</a>
                                    </li>
                                    -->
                                </ul>
                        </li>
                        <li class="my-nav @yield('nav-banner')">
                            <a class="js-arrow" href="{{ route('banner.index') }}">
                                <i class="fas fa-file"></i>Banner</a>
                        </li>
                        <li>
                            <a class="js-arrow" href="#">
                                <i class="fas fa-map-marker-alt"></i>Outlet</a>
                                <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                    <li class="my-nav @yield('nav-outlet')">
                                        <a href="{{route('outlets.index')}}">List</a>
                                    </li>
                                    <li class="my-nav @yield('nav-prize')">
                                        <a href="{{ route('app.prize') }}">Setting Hadiah</a>
                                    </li>
                                </ul>
                        </li>
                        <li class="my-nav">
                            <a href="{{ route('logout') }}">
                                <i class="fas fa-power-off"></i>Logout</a>
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
                        </div>
                    </div>
                </div>
            </header>
            
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">

                @if ($errors->any() || Session::has('alert'))
                    <div class="section__content section__content--p30">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="alert alert-info alert-dismissible fade show">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        @if($errors->any())
                                            @foreach ($errors->all() as $error)
                                                {{ $error }} <br>
                                            @endforeach
                                        @endif

                                        @if(Session::has('alert'))
                                            {{ Session::get('alert') }}
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                @yield('content')

                <br>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="../vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="../vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="../vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="../vendor/slick/slick.min.js"></script>
    <script src="../vendor/wow/wow.min.js"></script>
    <script src="../vendor/animsition/animsition.min.js"></script>
    <script src="../vendor/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <script src="../vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="../vendor/counter-up/jquery.counterup.min.js"></script>
    <script src="../vendor/circle-progress/circle-progress.min.js"></script>
    <script src="../vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="../vendor/select2/select2.min.js"></script>

    <!-- datetime picker -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

    <!-- Data table -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.18/b-1.5.4/b-html5-1.5.4/b-print-1.5.4/datatables.min.js"></script>

    <!-- Main JS-->
    <script src="../js/main.js"></script>

    <!-- Custom JS -->
    <script src="../js/custom.js"></script>

</body>

</html>
<!-- end document-->

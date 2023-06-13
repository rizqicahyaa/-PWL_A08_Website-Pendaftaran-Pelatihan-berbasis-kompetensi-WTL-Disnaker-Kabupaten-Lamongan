<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>WTL</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('template') }}/images/logo-wtl.png">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('template') }}/admin/css/bootstrap.min.css">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('template') }}/admin/css/font-awesome.min.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('template') }}/admin/css/owl.carousel.css">
    <link rel="stylesheet" href="{{ asset('template') }}/admin/css/owl.theme.css">
    <link rel="stylesheet" href="{{ asset('template') }}/admin/css/owl.transitions.css">
    <!-- meanmenu CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('template') }}/admin/css/meanmenu/meanmenu.min.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('template') }}/admin/css/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('template') }}/admin/css/normalize.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('template') }}/admin/css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- jvectormap CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('template') }}/admin/css/jvectormap/jquery-jvectormap-2.0.3.css">
    <!-- notika icon CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('template') }}/admin/css/notika-custom-icon.css">
        <!-- bootstrap select CSS
		============================================ -->
        <link rel="stylesheet" href="{{ asset('template') }}/admin/css/bootstrap-select/bootstrap-select.css">
    <!-- wave CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('template') }}/admin/css/wave/button.css">
    <link rel="stylesheet" href="{{ asset('template') }}/admin/css/wave/waves.min.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('template') }}/admin/css/main.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('template') }}/admin/style.css">
     <!-- Data Table JS
		============================================ -->
        <link rel="stylesheet" href="{{ asset('template') }}/admin/css/jquery.dataTables.min.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('template') }}/admin/css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="{{ asset('template') }}/admin/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- Start Header Top Area -->
    <div class="header-top-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="logo-area">
                        <img src="{{ asset('template') }}/images/logo-wtl.png" alt="Logo WTL" style="width:50px;"/>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="header-top-menu">
                        <ul class="nav navbar-nav notika-top-nav">
                            <li class="nav-item">
                                <a href="/logout"  role="button" class="nav-link"><span><i class="fa fa-power-off"></i> Logout</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Header Top Area -->

    <!--Navbar-->
    @include('layout.v_nav2')
    <!--End Navbar-->

    <!-- Start Status area -->
    <div class="notika-status-area" >
        <div class="container">
            @yield('contentadmin')
        </div>
    </div>
    <!-- End Status area-->

    <!-- Start Footer area-->
    <div class="footer-copyright-area navbar-fixed-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="footer-copy-right">
                        <p>Copyright &copy;
                            <script>
                                var CurrentYear = new Date().getFullYear()
                                document.write(CurrentYear)
                            </script></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer area-->
    <!-- jquery
		============================================ -->
    <script src="{{ asset('template') }}/admin/js/vendor/jquery-1.12.4.min.js"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="{{ asset('template') }}/admin/js/bootstrap.min.js"></script>
    <!-- wow JS
		============================================ -->
    <script src="{{ asset('template') }}/admin/js/wow.min.js"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="{{ asset('template') }}/admin/js/jquery-price-slider.js"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="{{ asset('template') }}/admin/js/owl.carousel.min.js"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="{{ asset('template') }}/admin/js/jquery.scrollUp.min.js"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="{{ asset('template') }}/admin/js/meanmenu/jquery.meanmenu.js"></script>
    <!-- counterup JS
		============================================ -->
    <script src="{{ asset('template') }}/admin/js/counterup/jquery.counterup.min.js"></script>
    <script src="{{ asset('template') }}/admin/js/counterup/waypoints.min.js"></script>
    <script src="{{ asset('template') }}/admin/js/counterup/counterup-active.js"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="{{ asset('template') }}/admin/js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- jvectormap JS
		============================================ -->
    <script src="{{ asset('template') }}/admin/js/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="{{ asset('template') }}/admin/js/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="{{ asset('template') }}/admin/js/jvectormap/jvectormap-active.js"></script>
    <!-- sparkline JS
		============================================ -->
    <script src="{{ asset('template') }}/admin/js/sparkline/jquery.sparkline.min.js"></script>
    <script src="{{ asset('template') }}/admin/js/sparkline/sparkline-active.js"></script>
    <!-- sparkline JS
		============================================ -->
    <script src="{{ asset('template') }}/admin/js/flot/jquery.flot.js"></script>
    <script src="{{ asset('template') }}/admin/js/flot/jquery.flot.resize.js"></script>
    <script src="{{ asset('template') }}/admin/js/flot/curvedLines.js"></script>
    <script src="{{ asset('template') }}/admin/js/flot/flot-active.js"></script>
    <!-- knob JS
		============================================ -->
    <script src="{{ asset('template') }}/admin/js/knob/jquery.knob.js"></script>
    <script src="{{ asset('template') }}/admin/js/knob/jquery.appear.js"></script>
    <script src="{{ asset('template') }}/admin/js/knob/knob-active.js"></script>
    <!--  wave JS
		============================================ -->
    <script src="{{ asset('template') }}/admin/js/wave/waves.min.js"></script>
    <script src="{{ asset('template') }}/admin/js/wave/wave-active.js"></script>
    <!--  todo JS
		============================================ -->
    <script src="{{ asset('template') }}/admin/js/todo/jquery.todo.js"></script>
    <!-- plugins JS
		============================================ -->
    <script src="{{ asset('template') }}/admin/js/plugins.js"></script>
    <!-- Data Table JS
		============================================ -->
        <script src="{{ asset('template') }}/admin/js/data-table/jquery.dataTables.min.js"></script>
        <script src="{{ asset('template') }}/admin/js/data-table/data-table-act.js"></script>
    <!-- main JS
		============================================ -->
    <script src="{{ asset('template') }}/admin/js/main.js"></script>
    <!-- bootstrap select JS
		============================================ -->
        <script src="{{ asset('template') }}/admin/js/bootstrap-select/bootstrap-select.js"></script>
</body>

</html>

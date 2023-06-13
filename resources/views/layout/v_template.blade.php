<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Basic Page Needs
 ================================================== -->
    <meta charset="utf-8">
    <title>WTL</title>

    <!-- Mobile Specific Metas
 ================================================== -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Construction Html5 Template">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta name="author" content="WTL">
    <meta name="generator" content="WTL">

    <!-- theme meta -->
    <meta name="theme-name" content="WTL" />

    <!-- ** Plugins Needed for the Project ** -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('template') }}/plugins/bootstrap/bootstrap.min.css">
    <!-- slick slider -->
    <link rel="stylesheet" href="{{ asset('template') }}/plugins/slick/slick.css">
    <!-- themefy-icon -->
    <link rel="stylesheet" href="{{ asset('template') }}/plugins/themify-icons/themify-icons.css">
    <!-- animation css -->
    <link rel="stylesheet" href="{{ asset('template') }}/plugins/animate/animate.css">
    <!-- aos -->
    <link rel="stylesheet" href="{{ asset('template') }}/plugins/aos/aos.css">
    <!-- venobox popup -->
    <link rel="stylesheet" href="{{ asset('template') }}/plugins/venobox/venobox.css">

    <!-- Main Stylesheet -->
    <link href="{{ asset('template') }}/css/style.css" rel="stylesheet">
    <link href="{{ asset('template') }}/css/style.css.map" rel="stylesheet">

    <!--Favicon-->
    <link rel="shortcut icon" href="{{ asset('template') }}/images/logo-wtl.png" type="image/x-icon">
    <link rel="icon" href="{{ asset('template') }}/images/logo-wtl.png" type="image/x-icon">

    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
@stack('style')
</head>

<body>
    <!-- preloader start -->
    {{-- <div class="preloader">
        <img src="{{ asset('template') }}/images/preloader.gif" alt="preloader">
    </div> --}}
    <!-- preloader end -->

    <!-- header -->
    <header class="fixed-top header">
        <!-- top header -->
        <div class="top-header py-2" style="background-color: #434cd4">
            <div class="container">
                <div class="row no-gutters">
                    <div class="col-lg-4 text-center text-lg-left">
                        <a class="text-lighten mr-2" href="#">Hubungi Kami (0322) 316147 |</a>
                        <ul class="list-inline d-inline">
                            <li class="list-inline-item mx-0"><a class="d-inline-block p-2 text-lighten"
                                    href="https://facebook.com/blk.lamongan"><i class="ti-facebook"></i></a></li>
                            <li class="list-inline-item mx-0"><a class="d-inline-block p-2 text-lighten"
                                    href="https://instagram.com/disnakerlamongan?igshid=MTlyMzRjYmRLZg=="><i
                                        class="ti-instagram"></i></a></li>
                            <li class="list-inline-item mx-0"><a class="d-inline-block p-2 text-lighten"
                                    href="https://youtube.com/@disnakerkab.lamongan9531"><i class="ti-youtube"></i></a>
                            </li>
                        </ul>
                    </div>
                    @if (Route::has('login'))
                    <div class="col-lg-8 text-center text-lg-right">
                        <ul class="list-inline">
                            @auth
                                <div class="col-lg-12 text-center text-lg-right">
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            {{-- @foreach ( $pendaftaran as $p) --}}
                                            <a class="text-uppercase text-lighten p-sm-2 py-2 px-0 d-inline-block"
                                            href="{{ url('/notifikasi') }}">Notifikasi</a><i class="ti-bell"
                                            style="color:white;"></i> <span class="badge badge-danger count" data-count="0" >0</span>{{-- {{$pendaftaran->count()}} --}}
                                            {{-- @endforeach --}}
                                           </li>
                                        <li class="list-inline-item"><a
                                                class="text-uppercase text-lighten p-sm-2 py-2 px-0 d-inline-block"
                                                href="{{ url ('/profil') }}">Profil, {{Auth::user()->name}}</a><i class="ti-user" style="color:white;"></i>
                                        </li>
                                        <li class="list-inline-item"><a
                                                class="text-uppercase text-lighten p-sm-2 py-2 px-0 d-inline-block"
                                                href="{{ url('/riwayatpelatihan') }}">Riwayat Pelatihan</a><i class="ti-book"
                                                style="color:white;"></i></li>
                                        <li class="list-inline-item dropdown view"><a
                                                class="text-uppercase text-lighten p-sm-2 py-2 px-0 d-inline-block"
                                                href="{{ url('/logout') }}">Logout</a><i class="ti-power-off"
                                                style="color:white;"></i></li>
                                    </ul>
                                </div>
                            @else
                                <li class="list-inline-item"><a
                                        class="text-uppercase text-lighten p-sm-2 py-2 px-0 d-inline-block"
                                        href="{{ route('login') }}">Login</a></li>
                                @if (Route::has('daftar'))
                                    <li class="list-inline-item"><a
                                            class="text-uppercase text-lighten p-sm-2 py-2 px-0 d-inline-block"
                                            href="{{ route('daftar') }}">Daftar</a></li>
                                @endif
                            @endauth
                        </ul>
                    </div>
                @endif
                </div>
            </div>
        </div>
        <!-- navbar -->
        <div class="navigation w-100">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-dark p-0">
                    <a class="navbar-brand" href="#"><img src="{{ asset('template') }}/images/logo-wtl.png"
                            alt="logo" style="width:88px;"></a>
                    <button class="navbar-toggler rounded-0" type="button" data-toggle="collapse"
                        data-target="#navigation" aria-controls="navigation" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navigation">
                        <ul class="navbar-nav ml-auto text-center">
                            @include('layout.v_nav')
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </header>
    <!-- /header -->
    @yield('content')

    <!-- footer -->
    <footer>
        <!-- footer content -->
        <div class="footer bg-footer section border-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-sm-8 mb-5 mb-lg-0">
                        <!-- logo -->
                        <a class="logo-footer" href=""><img class="img-fluid mb-4 w-75"
                                src="{{ asset('template') }}/images/logo-disnaker.png"
                                alt="Logo Disnaker Kab.Lamongan"></a>
                        <ul class="list-unstyled">
                            <li class="mb-2">Jl. Jaksa Agung Suprapto No.63 Lamongan</li>
                            <li class="mb-2">(0322) 316147</li>
                            <li class="mb-2">disnaker@lamongankab.go.id</li>
                        </ul>
                    </div>
                    <!-- links -->
                    <div class="col-lg-2 col-md-3 col-sm-4 mb-5 mb-md-0 mt-4">
                        <h4 class="text-dark mb-5">WTL</h4>
                        <ul class="list-unstyled">
                            <li class="mb-3"><a class="text-color" href="#">FAQ</a></li>
                        </ul>
                    </div>
                    <!-- support -->

                </div>
            </div>
        </div>
        <!-- copyright -->
        <div class="copyright py-4 bg-footer">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 text-sm-center text-center">
                        <p class="mb-0">Copyright &copy;
                            <script>
                                var CurrentYear = new Date().getFullYear()
                                document.write(CurrentYear)
                            </script>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- /footer -->

    <!-- jQuery -->
    <script src="{{ asset('template') }}/plugins/jQuery/jquery.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="{{ asset('template') }}/plugins/bootstrap/bootstrap.min.js"></script>
    <!-- slick slider -->
    <script src="{{ asset('template') }}/plugins/slick/slick.min.js"></script>
    <!-- aos -->
    <script src="{{ asset('template') }}/plugins/aos/aos.js"></script>
    <!-- venobox popup -->
    <script src="{{ asset('template') }}/plugins/venobox/venobox.min.js"></script>
    <!-- filter -->
    <script src="{{ asset('template') }}/plugins/filterizr/jquery.filterizr.min.js"></script>
    <!-- google map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU"></script>
    <script src="{{ asset('template') }}/plugins/google-map/gmap.js"></script>

    <!-- Main Script -->
    <script src="{{ asset('template') }}/js/script.js"></script>

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer">
    </script> --}}
    @stack('script')
</body>

</html>

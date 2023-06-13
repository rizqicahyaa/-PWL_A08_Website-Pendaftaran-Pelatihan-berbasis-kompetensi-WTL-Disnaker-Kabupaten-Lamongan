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

    <!--Favicon-->
    <link rel="shortcut icon" href="{{ asset('template') }}/images/logo-wtl.png" type="image/x-icon">
    <link rel="icon" href="{{ asset('template') }}/images/logo-wtl.png" type="image/x-icon">

</head>


<body>
    <!--Main Navigation-->
    <header class="">

        <!-- Section: Split screen -->
        <section class="">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6"
                        style="height: 100vh; display: grid; justify-content: center; align-content: center;">
                        <div class="row">
                            <div class="col-lg-12">
                                <p class="h2 section-title text-center text-dark">Hai! Selamat Datang <br> di Website
                                    WTL <br>
                                    (Work Training Lamongan)</p>
                                <img src="{{ asset('template') }}/images/logo-wtl.png" alt=""
                                    style="margin-left:100px; width:350px;">
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6"
                        style="height: 100vh; background-color:#ebf1ff; display: grid; justify-content: center; align-content: center;">
                        <p class="mb-50"><a href="/">
                                < Kembali</a>
                        </p>
                        <div class="row">
                            <div class="col-lg-12">
                                <p class="h2 section-title text-center text-dark">LOGIN</p>
                            </div>
                        </div>
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $item)
                                <li>{{ $item }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <form action="{{ route('login-proses') }}" method="POST" class="row justify-content-center">
                            @csrf
                            <div class="col-lg-10 mb-30">
                                <label>
                                    <p class="h5 text-dark">Email</p>
                                </label>
                                <input type="Email" class="form-control" id="email" name="email" value="{{ old('email') }}"
                                    placeholder="Email">
                            </div>
                            <div class="col-lg-10 mb-30">
                                <label>
                                    <p class="h5 text-dark">Password</p>
                                </label>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Password">
                            </div>
                            <div class="col-lg-10 mb-20">
                                <button type="submit" class="btn btn-primary" style="width: 100%;">LOGIN</button>
                            </div>
                            <div class="col-lg-10">
                                <p class=" text-center">Belum Punya Akun? <a href="{{ route('daftar') }}">Daftar</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </section>
        <!-- Section: Split screen -->

    </header>
    <!--Main Navigation-->
</body>

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

{{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}

    {{-- /js --}}
    {{-- @if ($message = Session::get('failed'))
        <script>
            Swal.fire({
                icon: 'error',
                text: '{{$message}}',
            });
        </script>
    @endif --}}

</html>

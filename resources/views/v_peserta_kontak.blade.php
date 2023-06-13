@extends('layout.v_template')
@section('content')
    <!-- page title -->
    <section class="page-title-section overlay">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <ul class="list-inline custom-breadcrumb mb-2">
                        <li class="list-inline-item"><a class="h2 text-primary font-secondary" href="?">Beranda</a>
                        </li>
                        <li class="list-inline-item text-dark h2 font-secondary nasted"><strong> Kontak</strong></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- /page title -->

    <!-- contact -->
    <section class="section bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mb-4 mb-lg-0">
                    <h3 class="text-dark">Map Lokasi</h3>
                    <!-- gmap -->
                    <section class="section pt-0">
                        <!-- Google Map -->
                        <div id="map_canvas" data-latitude="-7.111083" data-longitude="112.409833"></div>
                    </section>
                    <!-- /gmap -->

                    <!-- alamat, Notelp, email, fb, ig, youtube -->
                    <ul class="list-unstyled">
                        <div class="row">
                            <div class="col-lg-3 mb-5 mb-md-0">
                                <li class="mb-3"><h3 class="text-dark">Alamat</h3></li>
                            </div>
                            <div class="col-md-9">
                                <li class="mb-3"><h3 class="text-dark">: Jl. Jaksa Agung Suprapto No.63, Sukoanyar, Kec.Lamongan,
                                    Kabupaten Lamongan, Jawa Timur 62218, Indonesia.</h3></li>
                            </div>
                            <div class="col-lg-3 mb-5 mb-md-0">
                                <li class="mb-3"><h3 class="text-dark">No.Telp</h3></li>
                            </div>
                            <div class="col-md-9">
                                <li class="mb-3"><h3 class="text-dark">: (0322) 316147</h3></li>
                            </div>
                            <div class="col-lg-3 mb-5 mb-md-0">
                                <li class="mb-3"><h3 class="text-dark">Email</h3></li>
                            </div>
                            <div class="col-md-9">
                                <li class="mb-3"><h3 class="text-dark"> : disnaker@lamongankab.go.id</h3></li>
                            </div>
                            <div class="col-lg-3 mb-5 mb-md-0">
                                <li class="mb-3"><h3 class="text-dark">Facebook</h3></li>
                            </div>
                            <div class="col-md-9">
                                <li class="mb-3"><h3><a href="www.facebook.com/blk.lamongan" style="color: #000000"> : www.facebook.com/blk.lamongan</a></h3></li>
                            </div>
                            <div class="col-lg-3 mb-5 mb-md-0">
                                <li class="mb-3"><h3 class="text-dark">Instagram</h3></li>
                            </div>
                            <div class="col-md-9">
                                <li class="mb-3"><h3><a href="www.instagram.com/disnakerlamongan" style="color: #000000">: www.instagram.com/disnakerlamongan</a></h3></li>
                            </div>
                            <div class="col-lg-3 mb-5 mb-md-0">
                                <li class="mb-3"><h3 class="text-dark">Youtube</h3></li>
                            </div>
                            <div class="col-md-9">
                                <li class="mb-3"><h3><a href="www.youtube.com/@disnakerkab.lamongan9531" style="color: #000000">: www.youtube.com/@disnakerkab.lamongan9531</a></h3></li>
                            </div>
                        </div>
                    </ul>
                    <!-- /alamat, Notelp, email, fb, ig, youtube -->
                </div>
            </div>
        </div>
    </section>
    <!-- /contact -->
@endsection

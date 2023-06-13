@extends('layout.v_template')
@section('content')
    <!-- hero slider -->
    <section class="hero-section overlay bg-cover" data-background="images/banner/banner-1.jpg">
        <div class="container">
            <!-- slider item -->
            <div class="hero-slider-item">
                <div class="row">
                    <div class="col-md-7">
                        <h1 class="text-dark" data-animation-out="fadeOutRight" data-delay-out="5" data-duration-in=".3"
                            data-animation-in="fadeInLeft" data-delay-in=".1">Ayo Sukseskan
                            Karirmu Melalui WTL!</h1>
                        <p class="text-light mb-4" data-animation-out="fadeOutRight" data-delay-out="5"
                            data-duration-in=".3" data-animation-in="fadeInLeft" data-delay-in=".4">Temukan berbagai
                            pelatihan untuk meningkatkan skillmu dan dapatkan informasi lowongan pekerjaan disini.</p>
                        <a href="/jadwalpelatihan" class="btn btn-primary text-lighten" data-animation-out="fadeOutRight"
                            data-delay-out="5" data-duration-in=".3" data-animation-in="fadeInLeft"
                            data-delay-in=".7">DAFTAR SEKARANG</a>
                    </div>
                    <div class="col-md-4">
                        <img src="{{ asset('template') }}/images/hero.png" />
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /hero slider -->

    <section class="section-sm bg-primary">
        <div class="container">
            <div class="row">
                <!-- funfacts item -->
                <div class="col-md-6 col-sm-6 mb-4 mb-md-0">
                    <div class="text-center">
                        <h5 class="text-white">PELATIHAN</h5>
                        <h2 class="count text-white" data-count="{{ $pelatihan->count() }}">0</h2>
                    </div>
                </div>
                <!-- funfacts item -->
                <div class="col-md-6 col-sm-6 mb-4 mb-md-0">
                    <div class="text-center">
                        <h5 class="text-white">PESERTA</h5>
                        <h2 class="count text-white" data-count="{{$peserta->count()}}">0</h2> {{--  --}}
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- about us -->
    <section class="section">
        <div class="container" id="beranda">
            <div class="row align-items-center">
                <div class="col-md-6 order-2 order-md-1">
                    <h2 class="section-title">Tentang WTL</h2>
                    <p>WTL (Work Training Lamongan) adalah Website Pendaftaran pelatihan berbasis kompetensi yang diadakan
                        oleh dinas ketenagakerjaan kabupaten Lamongan.
                        Terdapat berbagai Pelatihan pada website WTL untuk mempermudah masyarakat khususnya kabupaten
                        lamongan dalam mendapatkan kompetensi pada bidang tertentu.
                        Dengan adanya Website WTL ini, diharapkan dapat mempermudah masyarakat dalam mendaftar pelatihan dan
                        mendapatkan informasi lowongan pekerjaan secara cepat, akurat, dan terpercaya.</p>

                </div>
                <div class="col-md-6 order-1 order-md-2 mb-4 mb-md-0">
                    <img class="img-fluid w-75" src="{{ asset('template') }}/images/logo-wtl.png" alt="about image">
                </div>
            </div>
        </div>
    </section>
    <!-- /about us -->

    <!-- courses -->
    <section class="section-sm">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex align-items-center section-title justify-content-between">
                        <h2 class="mb-0 text-nowrap mr-3">Pelatihan</h2>
                        <div class="border-top w-100 border-primary d-none d-sm-block"></div>
                        <div>
                            <a href="/jadwalpelatihan"
                                class="btn btn-sm btn-outline-primary ml-sm-3 d-none d-sm-block">Lihat
                                Semua</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- course list -->
            <div class="row justify-content-center">
                @foreach ($pelatihan as $no => $pel)
                    <!-- course item -->
                    <div class="col-lg-4 col-sm-6 mb-5">
                        <div class="card p-0 border-primary rounded-0 hover-shadow">
                            <img class="card-img-top rounded-0"
                                src="{{ Storage::url('public/foto-pelatihan/') . $pel->gambar }}" alt="course thumb">
                            <div class="card-body">
                                <ul class="list-inline mb-4 d-flex justify-content-between">
                                    <li class="list-inline-item"><i
                                            class="ti-calendar mr-1 text-color"></i>{{Carbon\Carbon::parse($pel->tglmulaipelatihan)->format('d M') }} -
                                        {{ Carbon\Carbon::parse($pel->tglakhirpelatihan)->format('d M Y') }}
                                    </li>
                                    <li
                                        class="{{ $pel->status == 'Buka' ? 'list-inline-item text-green' : 'list-inline-item text-red' }}">
                                        <strong> {{ $pel->status == 'Buka' ? 'Buka' : 'Tutup' }}</strong>
                                    </li>
                                </ul>
                                <h4 class="card-title">{{ $pel->pelatihan }}</h4>
                                <p class="card-text mb-4"> {{ $pel->deskripsi }}</p>
                                <a href="/jadwalpelatihan/detail{{ $pel->id }}" class="btn btn-primary btn-sm">Lihat
                                    Detail</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- /course list -->
            <!-- mobile see all button -->
            <div class="row">
                <div class="col-12 text-center">
                    <a href="/jadwalpelatihan" class="btn btn-sm btn-outline-primary d-sm-none d-inline-block">Lihat
                        Semua</a>
                </div>
            </div>
        </div>
    </section>
    <!-- /courses -->
@endsection

@extends('layout.v_template')
@section('content')
    <!-- page title -->
    <section class="page-title-section overlay">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="list-inline custom-breadcrumb mb-2">
                        <li class="list-inline-item"><a class="h2 text-primary font-secondary"
                                href="{{ route('peserta') }}">Beranda</a>
                        </li>
                        <li class="list-inline-item nasted"><a class="h2 text-primary font-secondary"
                                href="#">Informasi</a>
                        </li>
                        <li class="list-inline-item nasted"><a class="h2 text-primary font-secondary"
                                href="{{ route('jadwalpelatihan') }}">Jadwal
                                Pelatihan</a>
                        </li>
                        <li class="list-inline-item text-dark h2 font-secondary nasted"><strong> Detail</strong></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- /page title -->

    <!-- jadwal pelatihan -->
    <section class="section-sm">
        <div class="container">
                <div class="row" id="{{ $pelatihan->id }}">
                    <div class="col-12 mb-4">
                        <div class="card-img position-relative">
                            <!-- course thumb -->
                            <img src="{{ Storage::url('public/foto-pelatihan/').$pelatihan->gambar }}"
                                class="img-fluid w-100 h-75 card-img-top">
                            <div class="card-date h4 {{ $pelatihan->status == 'Buka' ? 'list-inline-item text-lighten' : 'list-inline-item text-lighten' }}">
                                <strong> {{ $pelatihan->status == 'Buka' ? 'Buka' : 'Tutup' }}</strong></div>
                        </div>
                    </div>
                </div>
                <!-- course info -->
                <div class="row align-items-center mb-5">
                    <div class="col-xl-3 order-1 col-sm-6 mb-4 mb-xl-0">
                        <h3>{{ $pelatihan->pelatihan }}</h3>
                    </div>
                    <div class="col-xl-6 order-sm-3 order-xl-2 col-12 order-2">
                        <ul class="list-inline text-xl-center">
                            <li class="list-inline-item mr-4 mb-3 mb-sm-0">
                                <div class="d-flex align-items-center">
                                    <div class="text-left">
                                        <h6 class="mb-0">Pendaftaran</h6>
                                        <p class="mb-0">{{Carbon\Carbon::parse($pelatihan->tglmulaipendaftaran)->format('d M') }} -
                                            {{ Carbon\Carbon::parse($pelatihan->tglakhirpendaftaran)->format('d M Y')}}
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li class="list-inline-item mr-4 mb-3 mb-sm-0">
                                <div class="d-flex align-items-center">
                                    <div class="text-left">
                                        <h6 class="mb-0">Pelatihan</h6>
                                        <p class="mb-0">{{Carbon\Carbon::parse($pelatihan->tglmulaipelatihan)->format('d M') }} -
                                        {{ Carbon\Carbon::parse($pelatihan->tglakhirpelatihan)->format('d M Y')}}</p>
                                    </div>
                                </div>
                            </li>
                            <li class="list-inline-item mr-4 mb-3 mb-sm-0">
                                <div class="d-flex align-items-center">
                                    <div class="text-left">
                                        <h6 class="mb-0">Lokasi</h6>
                                        <p class="mb-0">{{ $pelatihan->lokasi }}</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="col-xl-3 text-sm-right text-left order-sm-2 order-3 order-xl-3 col-sm-6 mb-4 mb-xl-0">
                        <a href="/pendaftaranpelatihan{{ $pelatihan->id}}" class="btn btn-primary">Daftar</a>
                    </div>
                    <!-- border -->
                    <div class="col-12 mt-4 order-4">
                        <div class="border-bottom border-primary"></div>
                    </div>
                </div>
                <!-- course details -->
                <div class="row">
                    <div class="col-12 mb-4">
                        <h4>Deskripsi Pelatihan</h4>
                        <p>{{ $pelatihan->deskripsi }}</p>
                    </div>
                    <div class="col-12 mb-4">
                        <h4 class="mb-3">Fasilitas</h4>
                        <div class="col-12 px-0">
                            <div class="row">
                                <div class="col-md-6">
                                    <ul class="list-styled">
                                        {!! nl2br(e($pelatihan->fasilitas)) !!}
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

        </div>
    </section>
    <!-- /jadwal pelatihan -->
@endsection

@extends('layout.v_template')
@section('content')
    <!-- page title -->
    <section class="page-title-section overlay">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <ul class="list-inline custom-breadcrumb mb-2">
                        <li class="list-inline-item"><a class="h2 text-primary font-secondary" href="{{ route('peserta') }}">Beranda</a>
                        </li>
                        <li class="list-inline-item nasted"><a class="h2 text-primary font-secondary"
                                href="{{ route('galeri') }}">Galeri</a>
                        </li>
                        <li class="list-inline-item text-dark h2 font-secondary nasted"><strong> Selengkapnya</strong></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- /page title -->

    <!-- Galeri detail -->
    <section class="section">
        <div class="container">
            <div class="row mb-3" id="{{ $galeri->pelatihan_id }}">
                <div class="col-md-6 mb-4 mb-md-0">
                    <h2>{{ $galeri->pelatihan->pelatihan }}</h2>
                    <p class="mb-4 d-block">{{Carbon\Carbon::parse($galeri->created_at)->format('d M Y') }} | Oleh Admin</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-sm-6 mb-4 mb-lg-0">
                    <div class="card rounded-0 hover-shadow border-top-0 border-left-0 border-right-0">
                        <img class="card-img-top rounded-0" src="{{ Storage::url('public/foto-galeri/') . $galeri->gambar1 }}" style="height: 450px;"
                            alt="Foto Dokumentasi">
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 mb-4 mb-lg-0">
                    <div class="card rounded-0 hover-shadow border-top-0 border-left-0 border-right-0">
                        <img class="card-img-top rounded-0" src="{{ Storage::url('public/foto-galeri/') . $galeri->gambar2 }}" style="height: 450px;"
                            alt="Foto Dokumentasi">
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 mb-4 mb-lg-0">
                    <div class="card rounded-0 hover-shadow border-top-0 border-left-0 border-right-0">
                        <img class="card-img-top rounded-0" src="{{ Storage::url('public/foto-galeri/') . $galeri->gambar3 }}" style="height: 450px;"
                            alt="Foto Dokumentasi">
                    </div>
                </div>
            </div>

    </div>

    </section>
    <!-- /Galeri detail -->
@endsection

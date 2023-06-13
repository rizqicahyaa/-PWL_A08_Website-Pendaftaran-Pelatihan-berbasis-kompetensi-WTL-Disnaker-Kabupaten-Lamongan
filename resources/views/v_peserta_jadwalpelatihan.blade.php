@extends('layout.v_template')
@section('content')
    <!-- page title -->
    <section class="page-title-section overlay">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <ul class="list-inline custom-breadcrumb mb-2">
                        <li class="list-inline-item"><a class="h2 text-primary font-secondary"
                                href="{{ route('peserta') }}">Beranda</a>
                        </li>
                        <li class="list-inline-item nasted"><a class="h2 text-primary font-secondary"
                                href="#">Informasi</a>
                        </li>
                        <li class="list-inline-item text-dark h2 font-secondary nasted"><strong> Jadwal Pelatihan</strong>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- /page title -->

    <!-- jadwal pelatihan -->
    <section class="section">
        <div class="container">
            <div class="row">
                @foreach ($pelatihan as $no => $pel)
                    <!-- course item -->
                    <div class="col-lg-4 col-sm-6 mb-5">
                        <div class="card p-0 border-primary rounded-0 hover-shadow">
                            <img class="card-img-top rounded-0"
                                src="{{ Storage::url('public/foto-pelatihan/').$pel->gambar }}" alt="course thumb">
                            <div class="card-body">
                                <ul class="list-inline mb-4 d-flex justify-content-between">
                                    <li class="list-inline-item"><i class="ti-calendar mr-1 text-color"></i>{{Carbon\Carbon::parse($pel->tglmulaipelatihan)->format('d M') }} -
                                        {{ Carbon\Carbon::parse($pel->tglakhirpelatihan)->format('d M Y')}}
                                    </li>
                                    <li class="{{ $pel->status == 'Buka' ? 'list-inline-item text-green' : 'list-inline-item text-red' }}">
                                        <strong> {{ $pel->status == 'Buka' ? 'Buka' : 'Tutup' }}</strong></li>
                                </ul>
                                <h4 class="card-title">{{ $pel->pelatihan }}</h4>
                                <p class="card-text mb-4">{{ $pel->deskripsi }}</p>
                                <a href="/jadwalpelatihan/detail{{ $pel->id}}" class="btn btn-primary btn-sm">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- /jadwal pelatihan -->
@endsection

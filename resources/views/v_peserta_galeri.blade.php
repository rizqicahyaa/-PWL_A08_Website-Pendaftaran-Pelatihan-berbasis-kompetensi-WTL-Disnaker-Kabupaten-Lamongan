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
                        <li class="list-inline-item text-dark h2 font-secondary nasted"><strong> Galeri</strong></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- /page title -->

    <!-- Galeri -->
    <section class="section">
        <div class="container">
            <!-- galeri list -->
            <div class="row">
                <!-- galeri item -->
                @foreach ($galeri as $no => $g)
                    <div class="col-lg-4 col-sm-6 mb-5">
                        <div class="card p-0 border-primary rounded-0 hover-shadow">
                            <img class="card-img-top rounded-0"
                                src="{{ Storage::url('public/foto-galeri/') . $g->gambar1 }}" style="height:400px;" alt="course thumb">
                            <div class="card-body">
                                <ul class="list-inline mb-1">
                                    <li class="list-inline-item"><i
                                            class="ti-calendar mr-1 text-color"></i>{{Carbon\Carbon::parse($g->created_at)->format('d M Y') }}</li>
                                    <li class="list-inline-item">
                                        <p class="text-color">Oleh Admin</p>
                                    </li>
                                </ul>
                                <h4 class="card-title mb-5">{{ $g->pelatihan }}</h4>
                                <a href="/galeri/detail{{ $g->id }}" class="btn btn-primary btn-sm">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- /galeri list -->
        </div>
    </section>

    <!-- /Galeri -->
@endsection

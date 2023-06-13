@extends('layout.v_template')
@section('content')
    <!-- page title -->
    <section class="page-title-section overlay">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <ul class="list-inline custom-breadcrumb mb-2">
                        <li class="list-inline-item"><a class="h2 text-primary font-secondary"
                                href="{{ route('peserta') }}">Beranda</a></li>
                        <li class="list-inline-item text-dark h2 font-secondary nasted"><strong> Profil</strong></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- /page title -->

    <!-- teacher details -->
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-5 mb-5">
                    @foreach ($datapeserta as $u)
                    @php $path = Storage::url('public/foto-user/'.$u->pasfoto); @endphp
                    <img src="{{ asset($path) }}" class="img-fluid w-100" alt="Foto Profil">
                </div>
                <div class="col-md-6 mb-5">
                    <h3>{{ Auth::user()->name }}</h3>
                        <h6 class="text-color">{{ $u->nik }}</h6>
                        <div class="row mt-3">
                            <div class="col-md-12 mb-5 mb-md-0">
                                <ul class="list-unstyled">
                                    <li class="mb-3">
                                        <p class="text-color">Email : {{ Auth::user()->email }}</p>
                                    </li>
                                    <li class="mb-3">
                                        <p class="text-color">No.Hp : {{ $u->nohp }}</p>
                                    </li>
                                    <li class="mb-3">
                                        <p class="text-color">Alamat KTP : {{ $u->alamatktp }}</p>
                                    </li>
                                    <li class="mb-3">
                                        <p class="text-color">Alamat Domisili : {{ $u->alamatdomisili }}</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6 mb-5 mb-md-0">
                                <ul class="list-unstyled">
                                    <a href="profil/edit{{ $u->user_id }}" class="btn btn-primary btn-sm">Edit Profil</a>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul class="list-unstyled">
                                    <a href="berkas/edit{{ $u->id }}" class="btn btn-primary btn-sm">Edit Berkas</a>
                                </ul>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- /teacher details -->
@endsection

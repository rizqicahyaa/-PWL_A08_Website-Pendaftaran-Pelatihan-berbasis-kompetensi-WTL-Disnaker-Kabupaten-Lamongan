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
                        <li class="list-inline-item text-dark h2 font-secondary nasted"><strong> Daftar Pelatihan</strong>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- /page title -->
    <!-- form enroll -->
    <section class="section bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="section-title">Pendaftaran Pelatihan</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-7 mb-4 mb-lg-0">
                    @foreach ($pelatihan as $pelatihan )
                    <form action="{{ route('riwayatpelatihan-proses', ['id', $pelatihan->id])}}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="pelatihan_id" value="{{ $pelatihan->id  }}">
                        <label for="">Nama Lengkap</label>
                        <input type="text" class="form-control mb-3" id="user_id" name="user_id"
                            value="{{ Auth::user()->name }}" placeholder="Nama Lengkap" disabled>
                        @foreach ($datapeserta as $datapeserta )
                        <label for="">NIK (Nomor Induk Kependudukan)</label>
                        <input type="text" class="form-control mb-3"
                            value="{{ old('datapeserta_id',$datapeserta->nik) }}" placeholder="NIK" disabled>
                        @endforeach

                        <label for="">Pelatihan</label>
                        <input type="text" class="form-control mb-3" id="pelatihan_id" name="pelatihan_id"
                            value="{{ old('pelatihan', $pelatihan->pelatihan) }}" placeholder="Pelatihan" disabled>
                        <button type="submit" value="send" class="btn btn-primary">Submit</button>
                    </form>

                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- /form enroll  -->
@endsection

@extends('layout.v_template')
@section('content')
    @push('style')
        <!-- page title -->
        <section class="page-title-section overlay">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <ul class="list-inline custom-breadcrumb mb-2">
                            <li class="list-inline-item"><a class="h2 text-primary font-secondary"
                                    href="{{ route('peserta') }}">Beranda</a>
                            </li>
                            <li class="list-inline-item text-dark h2 font-secondary nasted"><strong> Riwayat Pelatihan</strong>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- /page title -->

        <!-- riwayat pelatihan -->
        <section class="section">
            <div class="container">
                <div class="row">
                    <!-- course item -->
                    @foreach ($pendaftaran as $pendaftaran)
                        <div class="col-lg-5 col-sm-6 mb-5">
                            <div class="card p-0 border-primary rounded-0 hover-shadow">
                                <img class="card-img-top rounded-0"
                                    src="{{ Storage::url('public/foto-pelatihan/') . $pendaftaran->gambar }}"
                                    alt="course thumb">
                                <div class="card-body">
                                    <ul class="list-inline mb-4 d-flex justify-content-between">
                                        <li class="list-inline-item"><i
                                                class="ti-calendar mr-1 text-color"></i>{{ Carbon\Carbon::parse($pendaftaran->tglmulaipelatihan)->format('d M') }}
                                            -
                                            {{ Carbon\Carbon::parse($pendaftaran->tglakhirpelatihan)->format('d M Y') }}
                                        </li>
                                        @if ($pendaftaran->status_pendaftaran == 'Menunggu Konfirmasi')
                                            <li class="list-inline-item text-primary">
                                                <strong>{{ $pendaftaran->status_pendaftaran }}</strong>
                                            </li>
                                        @elseif ($pendaftaran->status_pendaftaran == 'Lolos')
                                            <li class="list-inline-item text-success">
                                                <strong>{{ $pendaftaran->status_pendaftaran }}</strong>
                                            </li>
                                        @elseif ($pendaftaran->status_pendaftaran == 'Tidak Lolos')
                                            <li class="list-inline-item text-danger">
                                                <strong>{{ $pendaftaran->status_pendaftaran }}</strong>
                                            </li>
                                        @elseif ($pendaftaran->status_pendaftaran == 'Sedang Pelatihan')
                                            <li class="list-inline-item text-warning">
                                                <strong>{{ $pendaftaran->status_pendaftaran }}</strong>
                                            </li>
                                        @elseif ($pendaftaran->status_pendaftaran == 'Lulus')
                                            <li class="list-inline-item text-success">
                                                <strong>{{ $pendaftaran->status_pendaftaran }}</strong>
                                            </li>
                                        @else
                                            <li class="list-inline-item text-danger">
                                                <strong>{{ $pendaftaran->status_pendaftaran }}</strong>
                                            </li>
                                        @endif
                                    </ul>
                                    <h4 class="card-title mb-2">{{ $pendaftaran->pelatihan }}</h4>
                                    <p class="card-text mb-1">Nama : {{ $pendaftaran->name }}</p>
                                    <p class="card-text mb-1">Tanggal Pendaftaran :
                                        {{ Carbon\Carbon::parse($pendaftaran->tglpendaftaran)->format('d M Y') }}</p>
                                    <p class="card-text mb-1">No. Pendaftaran : {{ $pendaftaran->nopendaftaran }}</p>
                                    <p class="card-text mb-1">Tanggal Pengumuman Hasil Seleksi : {{ Carbon\Carbon::parse($pendaftaran->tglakhirpendaftaran)->format('d M Y') }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        @endpush
    </section>
    @push('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    @if ($message = Session::get('success'))
            Swal.fire({
                icon: 'success',
                title: '{{$message}}',
                text: 'Silahkan Tunggu Pengumuman Hasil Seleksi Pada Tanggal {{ Carbon\Carbon::parse($pendaftaran->tglakhirpendaftaran)->format('d M Y') }}',
            });
        </script>
        @endif
        {{-- <script>
            @if (Session::has('success'))
                toastr.success("{{ Session::get('success') }}")
                toastr.success('Tunggu Pengumuman Hasil Seleksi')
                toastr.options.timeOut = 10;
            @endif
        </script> --}}
    @endpush

    <!-- /riwayat pelatihan -->
@endsection
